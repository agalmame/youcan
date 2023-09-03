<?php

namespace App\Services\GitHub;

use App\Repositories\Contracts\RepoRepositoryInterface;

class GitHubService
{

    protected $repoRepository;

    public function __construct(RepoRepositoryInterface $repoRepository) {
        $this->repoRepository = $repoRepository;
    }
    public function getMyRepo( )
    {
        return $this->repoRepository->MyRepo();
    }
}