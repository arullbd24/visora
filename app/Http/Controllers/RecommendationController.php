<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RecommendationController extends Controller
{
    public function recommendForAuthUser(Request $request)
    {
        if (!Auth::check()) {
            abort(403, 'Unauthorized');
        }

        $userId = Auth::id();
        return $this->recommendForUser($request, $userId);
    }

    public function recommendForUser(Request $request, $userId)
    {
        $kategoriFilter = $request->query('kategori');
        $userProfile = [];

        // Ambil preferensi user
        $rawPreferences = DB::table('user_preferences')
            ->where('user_id', $userId)
            ->select('tag', 'rating')
            ->get();

        // Bobot dasar
        $bobotDistribusi = [
            'profesional' => 40,
            'cinematic'   => 25,
            'formal'      => 20,
            'informal'    => 15,
        ];

        $ratingTotal = $rawPreferences->sum('rating');
        if ($ratingTotal == 0) {
            return redirect()->route('rate.form')->with('warning', 'Silakan isi penilaian terlebih dahulu.');
        }

        // Bangun profil user
        foreach ($rawPreferences as $preference) {
            $tag = $preference->tag;
            $rating = $preference->rating;
            if (isset($bobotDistribusi[$tag])) {
                $userProfile[$tag] = ($rating / $ratingTotal) * $bobotDistribusi[$tag];
            }
        }

        // Ambil data layanan
        $allTagsQuery = DB::table('service_tags')
            ->join('services', 'services.id', '=', 'service_tags.service_id')
            ->select('services.id', 'services.name as nama', 'services.description as deskripsi', 'service_tags.tag', 'service_tags.weight');

        if ($kategoriFilter) {
            $allTagsQuery->where('services.categories', 'like', '%' . $kategoriFilter . '%');
        }

        $allTags = $allTagsQuery->get();

        // Profil layanan
        $serviceProfiles = [];
        foreach ($allTags as $tag) {
            $serviceId = $tag->id;
            if (!isset($serviceProfiles[$serviceId])) {
                $serviceProfiles[$serviceId] = [
                    'nama' => $tag->nama,
                    'deskripsi' => $tag->deskripsi,
                    'tags' => []
                ];
            }
            $serviceProfiles[$serviceId]['tags'][$tag->tag] = $tag->weight ?? 1;
        }

        // Cosine similarity
        $results = [];
        foreach ($serviceProfiles as $serviceId => $service) {
            $dotProduct = 0;
            $userMagnitude = 0;
            $serviceMagnitude = 0;
            $matchingTags = [];

            foreach ($userProfile as $tag => $rating) {
                $userMagnitude += $rating ** 2;
                if (isset($service['tags'][$tag])) {
                    $dotProduct += $rating * $service['tags'][$tag];
                    $matchingTags[] = $tag;
                }
            }

            foreach ($service['tags'] as $val) {
                $serviceMagnitude += $val ** 2;
            }

            $cosine = 0;
            if ($userMagnitude != 0 && $serviceMagnitude != 0) {
                $cosine = $dotProduct / (sqrt($userMagnitude) * sqrt($serviceMagnitude));
            }

            $results[] = [
                'nama' => $service['nama'],
                'deskripsi' => $service['deskripsi'],
                'score' => round($cosine * 100, 1), // Konversi ke persen
                'justifikasi' => count($matchingTags)
                    ? 'Cocok karena kecocokan pada: ' . implode(', ', $matchingTags)
                    : 'Tidak ada kesamaan yang kuat.'
            ];
        }

        // Ambil hasil teratas
        $filtered = collect($results)
            ->filter(fn($item) => $item['score'] > 0)
            ->sortByDesc('score')
            ->take(5)
            ->values();

        foreach ($filtered as $rec) {
            DB::table('recommendation_history')->insert([
                'user_id' => $userId,
                'service_name' => $rec['nama'],
                'description' => $rec['deskripsi'],
                'score' => $rec['score'],
                'justification' => $rec['justifikasi'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }


        return view('recommendation', [
            'recommendations' => $filtered
        ]);
    }

    public function showRatingForm()
    {
        return view('rate');
    }

    public function viewHistory()
    {
        $userId = Auth::id();
        $history = DB::table('recommendation_history')
            ->where('user_id', $userId)
            ->orderByDesc('created_at')
            ->take(20)
            ->get();

        return view('recommendation_history', compact('history'));
    }


    public function saveRatings(Request $request)
    {
        $userId = Auth::id();
        session(['tujuan_pemesanan' => $request->input('tujuan_pemesanan')]);

        foreach ($request->input('ratings', []) as $tag => $rating) {
            if ($rating !== null) {
                DB::table('user_preferences')->updateOrInsert(
                    ['user_id' => $userId, 'tag' => $tag],
                    ['rating' => $rating]
                );
            }
        }

        return redirect()->route('recommend.user')->with('success', 'Terima kasih! Rekomendasi disiapkan.');
    }
}
