<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;
class TmdbService
{
    protected $baseUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->baseUrl = 'https://api.themoviedb.org/3/';
        $this->apiKey = config('services.tmdb.api_key'); 
    }

    public function searchMovies($query)
    {
        try {
            $response = Http::get($this->baseUrl . 'search/movie', [
                'api_key' => $this->apiKey,
                'query' => $query,
            ]);
    
            return $response->json();
        } catch (RequestException $e) {
            // Log the error
            \Log::error('API request failed: ' . $e->getMessage());
    
            // Return null or an empty array to signify no results
            return [];
        }
    }
    
}
