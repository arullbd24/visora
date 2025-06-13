<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\CosineSimilarityService;
use App\Models\Service;

class RecommendationController extends Controller
{
    public function recommendForUser($userId)
    {
        // Ambil preferensi user dari rating yang sudah dia berikan terhadap layanan
        $preferences = DB::table('user_preferences')
            ->join('service_tags', 'user_preferences.service_id', '=', 'service_tags.service_id')
            ->where('user_preferences.user_id', $userId)
            ->select('service_tags.tag', DB::raw('user_preferences.rating * service_tags.weight as score'))
            ->get();

        // Ubah preferensi user menjadi vektor
        $userVector = [];
        foreach ($preferences as $pref) {
            if (isset($userVector[$pref->tag])) {
                $userVector[$pref->tag] += $pref->score;
            } else {
                $userVector[$pref->tag] = $pref->score;
            }
        }

        // Ambil semua layanan dan tag-tag-nya
        $serviceTags = DB::table('service_tags')
            ->select('service_id', 'tag', 'weight')
            ->get()
            ->groupBy('service_id');

        // Ubah menjadi vektor layanan
        $serviceVectors = [];
        foreach ($serviceTags as $serviceId => $tags) {
            $vector = [];
            foreach ($tags as $tag) {
                $vector[$tag->tag] = $tag->weight;
            }
            $serviceVectors[$serviceId] = $vector;
        }

        // Hitung rekomendasi dengan cosine similarity
        $cosine = new CosineSimilarityService();
        $recommendations = $cosine->getRecommendations($userVector, $serviceVectors);

        // Tambahkan nama service agar bisa ditampilkan
        $recommendations = collect($recommendations)->map(function ($item) {
            $service = Service::find($item['service_id']);
            return [
                'service_id' => $item['service_id'],
                'name' => $service ? $service->name : 'Unknown Service',
                'estimated_rating' => $item['estimated_rating'],
            ];
        });

        // Tampilkan ke view
        return view('recommendation', [
            'userId' => $userId,
            'recommendations' => $recommendations
        ]);
    }
}
