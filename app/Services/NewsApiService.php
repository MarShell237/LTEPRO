<?php
namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class NewsApiService
{
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = env('NEWS_API_KEY');
        $this->baseUrl = 'https://newsapi.org/v2';
    }

    public function getSportsNews($query = 'football', $country = 'fr', $minutes = 30)
    {
        $cacheKey = 'newsapi_' . $query . '_' . $country;
        return Cache::remember($cacheKey, $minutes * 60, function () use ($query, $country) {
            $response = Http::withHeaders([
                'X-Api-Key' => $this->apiKey,
            ])->get($this->baseUrl . '/top-headlines', [
                'q' => $query,
                'country' => $country,
                'category' => 'sports',
                'pageSize' => 20,
            ]);
            return $response->json();
        });
    }
}
