<?php


namespace App\Repositories\GitHub;

use Illuminate\Support\Facades\Http;

class BaseGitHubRepository {

    private $baseUrl = "https://api.github.com";
    private $token;

    public function __construct()
    {
        $this->token = env('GITHUB_TOKEN');
    }
    protected function request($endpoint)
    {
        $response = Http::withHeaders([
            'Authorization' => 'token ' . $this->token,
            'Accept' => 'application/vnd.github.v3+json',
        ])->get("$this->baseUrl/$endpoint");

        return $response->json();
    }
}