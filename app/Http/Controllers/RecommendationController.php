<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\CosineSimilarityService;
use App\Models\Service;

class RecommendationController extends Controller
{
    public function recommendForUser(Request $request, $userId)
    {
        // Ambil preferensi pengguna
        $kategoriFilter = $request->query('kategori');
        $preferences = DB::table('user_preferences')
            ->join('service_tags', 'user_preferences.service_id', '=', 'service_tags.service_id')
            ->join('services', 'services.id', '=', 'service_tags.service_id')
            ->select(
                'services.id',
                'services.name as nama',
                'services.description as deskripsi',
                'service_tags.tag',
                'user_preferences.rating'
            )
            ->where('user_preferences.user_id', $userId)
            ->get();

        foreach ($preferences as $preference) {
            if (!isset($userProfile[$preference->tag])) {
                $userProfile[$preference->tag] = 0;
            }
            $userProfile[$preference->tag] += $preference->rating;
        }

        // Ambil semua jasa dan tag
        $allTagsQuery = DB::table('service_tags')
            ->join('services', 'services.id', '=', 'service_tags.service_id')
            ->select('services.id', 'services.name as nama', 'services.description as deskripsi', 'service_tags.tag');

        if ($kategoriFilter) {
            $allTagsQuery->where('services.categories', 'like', '%' . $kategoriFilter . '%');
        }

        $allTags = $allTagsQuery->get();


        // Buat profil setiap jasa
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
            $serviceProfiles[$serviceId]['tags'][$tag->tag] = 1;
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
                    $dotProduct += $rating * 1;
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

        // Filter hasil dengan skor > 0, urutkan, ambil top 5
        $filtered = collect($results)
            ->filter(fn($item) => $item['score'] > 0)
            ->sortByDesc('score')
            ->take(5)
            ->values();

        return view('recommendation', [
            'userId' => $userId,
            'recommendations' => $filtered
        ]);
    }
}
