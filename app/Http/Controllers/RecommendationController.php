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
        $preferences = DB::table('user_preferences')
            ->select('user_id', 'service_id', 'rating')
            ->get();

        $userRatings = [];
        foreach ($preferences as $preference) {
            $userRatings[$preference->user_id][$preference->service_id] = $preference->rating;
        }

        $cosine = new CosineSimilarityService();
        $recommendations = $cosine->getRecommendations($userId, $userRatings);

        $recommendations = collect($recommendations)->map(function ($item) {
            $service = Service::find($item['service_id']); // tidak pakai use (Service)
            return [
                'service_id' => $item['service_id'],
                'name' => $service ? $service->name : 'Unknown Service',
                'estimated_rating' => $item['estimated_rating'],
            ];
        });

        return view('recommendation', [
            'userId' => $userId,
            'recommendations' => $recommendations
        ]);
    }
}
