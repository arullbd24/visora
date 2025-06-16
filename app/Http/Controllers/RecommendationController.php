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

        // Ambil semua rating user berdasarkan TAG
        $rawPreferences = DB::table('user_preferences')
            ->where('user_id', $userId)
            ->select('tag', 'rating')
            ->get();

        foreach ($rawPreferences as $preference) {
            $userProfile[$preference->tag] = $preference->rating;
        }

        // Ambil semua layanan dan tag-nya
        $allTagsQuery = DB::table('service_tags')
            ->join('services', 'services.id', '=', 'service_tags.service_id')
            ->select('services.id', 'services.name as nama', 'services.description as deskripsi', 'service_tags.tag', 'service_tags.weight');

        if ($kategoriFilter) {
            $allTagsQuery->where('services.categories', 'like', '%' . $kategoriFilter . '%');
        }

        $allTags = $allTagsQuery->get();

        // Susun profil setiap layanan
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

        // Hitung cosine similarity
        $results = [];
        foreach ($serviceProfiles as $serviceId => $service) {
            $dotProduct = 0;
            $userMagnitude = 0;
            $serviceMagnitude = 0;

            foreach ($userProfile as $tag => $rating) {
                $userMagnitude += $rating ** 2;
                if (isset($service['tags'][$tag])) {
                    $dotProduct += $rating * $service['tags'][$tag];
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
                'score' => round($cosine, 3)
            ];
        }

        // Filter dan urutkan
        $filtered = collect($results)
            ->filter(fn($item) => $item['score'] > 0)
            ->sortByDesc('score')
            ->take(5)
            ->values();

        return view('recommendation', [
            'recommendations' => $filtered
        ]);
    }

    public function showRatingForm()
    {
        $services = DB::table('services')->inRandomOrder()->take(6)->get();
        return view('rate', ['services' => $services]); // <- ini penting!
    }

    public function saveRatings(Request $request)
    {
        $userId = Auth::id();

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
