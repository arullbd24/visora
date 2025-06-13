<?php

namespace App\Services;

class CosineSimilarityService
{
    // Menghitung cosine similarity antara 2 vektor (array asosiatif)
    private function cosineSimilarity(array $vec1, array $vec2): float
    {
        $dotProduct = 0;
        $normA = 0;
        $normB = 0;

        $allKeys = array_unique(array_merge(array_keys($vec1), array_keys($vec2)));

        foreach ($allKeys as $key) {
            $a = $vec1[$key] ?? 0;
            $b = $vec2[$key] ?? 0;

            $dotProduct += $a * $b;
            $normA += $a * $a;
            $normB += $b * $b;
        }

        if ($normA == 0 || $normB == 0) {
            return 0.0;
        }

        return $dotProduct / (sqrt($normA) * sqrt($normB));
    }

    // Menghasilkan rekomendasi untuk user berdasarkan preferensi tag
    public function getRecommendations(array $userPreference, array $services)
    {
        $results = [];

        foreach ($services as $serviceId => $serviceTags) {
            $similarity = $this->cosineSimilarity($userPreference, $serviceTags);
            $results[] = [
                'service_id' => $serviceId,
                'estimated_rating' => round($similarity, 3),
            ];
        }

        usort($results, fn($a, $b) => $b['estimated_rating'] <=> $a['estimated_rating']);
        return $results;
    }
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// namespace App\Services;

// class CosineSimilarityService
// {
//     public function getRecommendations($userId, $userRatings)
//     {
//         $similarities = [];

//         foreach ($userRatings as $otherUserId => $ratings) {
//             if ($userId != $otherUserId) {
//                 $similarities[$otherUserId] = $this->cosineSimilarity(
//                     $userRatings[$userId] ?? [],
//                     $ratings
//                 );
//             }
//         }

//         arsort($similarities);
//         $topUserId = array_key_first($similarities);

//         if (!isset($userRatings[$topUserId])) {
//             return [];
//         }

//         $recommendations = [];
//         foreach ($userRatings[$topUserId] as $serviceId => $rating) {
//             if (!isset($userRatings[$userId][$serviceId])) {
//                 $recommendations[] = [
//                     'service_id' => $serviceId,
//                     'estimated_rating' => $rating
//                 ];
//             }
//         }

//         return $recommendations;
//     }

//     private function cosineSimilarity($ratingsA, $ratingsB)
//     {
//         $dotProduct = 0;
//         $normA = 0;
//         $normB = 0;

//         foreach ($ratingsA as $key => $valueA) {
//             $valueB = $ratingsB[$key] ?? 0;
//             $dotProduct += $valueA * $valueB;
//             $normA += pow($valueA, 2);
//         }

//         foreach ($ratingsB as $valueB) {
//             $normB += pow($valueB, 2);
//         }

//         if ($normA == 0 || $normB == 0) {
//             return 0;
//         }

//         return $dotProduct / (sqrt($normA) * sqrt($normB));
//     }
// }
