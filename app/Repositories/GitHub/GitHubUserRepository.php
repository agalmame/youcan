<?php

namespace App\Repositories\GitHub;

use App\Repositories\Contracts\GitHubUserRepositoryInterface;
use App\Repositories\GitHub\BaseGitHubRepository;

class GitHubUserRepository extends BaseGitHubRepository implements GitHubUserRepositoryInterface
{

    public function users($limit=30, $page=1): array
    {
        $data = $this->request("users?per_page=$limit&page=$page");
        return $data;
    }
}