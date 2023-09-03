<?php

namespace App\Repositories\GitHub;

use App\DTOs\RepoDTO;
use App\DTOs\ReposCollectionDTO;
use App\Repositories\Contracts\RepoRepositoryInterface;
use App\Repositories\GitHub\BaseGitHubRepository;

class GitHubRepoRepository extends BaseGitHubRepository implements RepoRepositoryInterface 
{


    public function MyRepo(): array
    {
        $data = $this->request("user/repos");
        // dd($data);
        return (new ReposCollectionDTO($data))->toArray();
    }

    public function getRepo($owner, $repo): array
    {
        $data = $this->request("repos/$owner/$repo");
        return (new RepoDTO($data))->fromArray();
    }
}