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

        // Ambil semua rating user dan tag dari layanan yang dirating
        $rawPreferences = DB::table('user_preferences')
            ->join('service_tags', 'user_preferences.service_id', '=', 'service_tags.service_id')
            ->where('user_preferences.user_id', $userId)
            ->select(
                'service_tags.tag',
                'service_tags.weight',
                'user_preferences.rating'
            )
            ->get();

        foreach ($rawPreferences as $preference) {
            if (!isset($userProfile[$preference->tag])) {
                $userProfile[$preference->tag] = 0;
            }
            // Kalikan rating dengan bobot tag (weight)
            $userProfile[$preference->tag] += $preference->rating * ($preference->weight ?? 1);
        }

        // Ambil semua layanan dan tag-nya
        $allTagsQuery = DB::table('service_tags')
            ->join('services', 'services.id', '=', 'service_tags.service_id')
            ->select('services.id', 'services.name as nama', 'services.description as deskripsi', 'service_tags.tag', 'service_tags.weight');

        if ($kategoriFilter) {
            $allTagsQuery->where('services.categories', 'like', '%' . $kategoriFilter . '%');
        }

        $allTags = $allTagsQuery->get();

        // Susun profil setiap service
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

        // Filter hasil dengan skor positif dan urutkan
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
        return view('rate', ['services' => $services]);
    }

    public function saveRatings(Request $request)
    {
        $userId = Auth::id();
        foreach ($request->input('ratings', []) as $serviceId => $rating) {
            if ($rating !== null) {
                DB::table('user_preferences')->updateOrInsert(
                    ['user_id' => $userId, 'service_id' => $serviceId],
                    ['rating' => $rating]
                );
            }
        }

        return redirect()->route('recommend.user')->with('success', 'Terima kasih! Rekomendasi disiapkan.');
    }
}
