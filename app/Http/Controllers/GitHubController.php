<?php

namespace App\Http\Controllers;

use App\Services\GitHub\GitHubService;

class GitHubController extends Controller
{
    Private $github;

    public function __construct(GitHubService $github)
    {
        $this->github = $github;
    }


    public function myRepos()
    {
        return $this->github->getMyRepo();
    }
}