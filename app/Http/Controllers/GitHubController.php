<?php

namespace App\Http\Controllers;

use App\Services\GitHub\GitHubService;
use Symfony\Component\HttpFoundation\Response;

class GitHubController extends Controller
{
    Private $github;
    public function __construct(GitHubService $github)
    {
        $this->github = $github;
    }


    public function myRepos()
    {
        $reposData = $this->github->getMyRepo();
        return $this->transform($reposData);
    }

    public function getRepo($owner, $repo)
    {
        $repoData = $this->github->getRepo($owner, $repo);
        return $this->transform($repoData);
    }

    protected function transform($data)
    {
        return response()->json(["data" => $data ], Response::HTTP_OK);
    }

}