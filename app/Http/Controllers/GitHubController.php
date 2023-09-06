<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaginationRequest;
use App\Services\GitHub\GitHubService;
use Symfony\Component\HttpFoundation\Response;

class GitHubController extends Controller
{
    Private $githubService;
    public function __construct(GitHubService $github)
    {
        $this->githubService = $github;
    }


    public function myRepos()
    {
        $reposData = $this->githubService->getMyRepo();
        return $this->transform($reposData);
    }

    public function getRepo($owner, $repo)
    {
        $repoData = $this->githubService->getRepo($owner, $repo);
        return $this->transform($repoData);
    }

    public function usersWithStats(PaginationRequest $request)
    {
        $page = $request->input('page', 1);
        $limit = $request->input('limit', 30);
        return $this->githubService->usersWithStats($limit, $page);
    }

    protected function transform($data)
    {
        return response()->json(["data" => $data ], Response::HTTP_OK);
    }

}