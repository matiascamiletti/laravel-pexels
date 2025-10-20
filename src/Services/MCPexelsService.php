<?php

namespace MC\Pexels\Services;

use Illuminate\Support\Facades\Http;

class MCPexelsService 
{
    /**
     * The API key for authenticating requests.
     */
    protected $apiKey = '';
    /**
     * The base URL for the Pexels API.
     */
    protected $baseUrl = 'https://api.pexels.com/';

    public function __construct($config)
    {
        $this->apiKey = $config['api_key'];
    }

    public function searchVideos($query, $orientation = null, $size = null, $perPage = 15, $page = 1)
    {
        $response = Http::withHeaders([
            'Authorization' => $this->apiKey,
        ])->get($this->baseUrl . 'videos/search', [
            'query' => $query,
            'orientation' => $orientation,
            'size' => $size,
            'per_page' => $perPage,
            'page' => $page,
        ]);

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception('Error fetching videos from Pexels API: ' . $response->body());
    }
}
