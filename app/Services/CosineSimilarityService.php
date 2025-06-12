<?php

namespace App\Services;

class CosineSimilarityService
{
    public function getRecommendations($userId, $userRatings)
    {
        $similarities = [];

        foreach ($userRatings as $otherUserId => $ratings) {
            if ($userId != $otherUserId) {
                $similarities[$otherUserId] = $this->cosineSimilarity(
                    $userRatings[$userId] ?? [],
                    $ratings
                );
            }
        }

        arsort($similarities);
        $topUserId = array_key_first($similarities);

        if (!isset($userRatings[$topUserId])) {
            return [];
        }

        $recommendations = [];
        foreach ($userRatings[$topUserId] as $serviceId => $rating) {
            if (!isset($userRatings[$userId][$serviceId])) {
                $recommendations[] = [
                    'service_id' => $serviceId,
                    'estimated_rating' => $rating
                ];
            }
        }

        return $recommendations;
    }

    private function cosineSimilarity($ratingsA, $ratingsB)
    {
        $dotProduct = 0;
        $normA = 0;
        $normB = 0;

        foreach ($ratingsA as $key => $valueA) {
            $valueB = $ratingsB[$key] ?? 0;
            $dotProduct += $valueA * $valueB;
            $normA += pow($valueA, 2);
        }

        foreach ($ratingsB as $valueB) {
            $normB += pow($valueB, 2);
        }

        if ($normA == 0 || $normB == 0) {
            return 0;
        }

        return $dotProduct / (sqrt($normA) * sqrt($normB));
    }
}
