<?php

namespace App\Services\GitHub;

use App\Repositories\Contracts\GitHubUserRepositoryInterface;
use App\Repositories\Contracts\RepoRepositoryInterface;

class GitHubService
{

    protected $repoRepository;
    protected $githubUserRepository;

    public function __construct(
        RepoRepositoryInterface $repoRepository,
        GitHubUserRepositoryInterface $githubUserRepository
    ) {
        $this->repoRepository = $repoRepository;
        $this->githubUserRepository = $githubUserRepository;
    }   
    public function getMyRepo()
    {
        return $this->repoRepository->myRepo();
    }

    public function getRepo(string $owner, string $repo)
    {
        return $this->repoRepository->getRepo($owner, $repo);
    }

    public function usersWithStats($limit, $page)
    {
        $users = $this->githubUserRepository->users($limit, $page);
        return $users;
    }


}