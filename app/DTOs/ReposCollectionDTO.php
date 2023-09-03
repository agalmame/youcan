<?php

namespace App\DTOs;

use Illuminate\Support\Collection;

class ReposCollectionDTO
{
    private Collection $repos;

    public function __construct(array $reposData)
    {
        $this->repos = collect($reposData)->map(function ($repoData) {
            return new RepoDTO($repoData);
        });
    }

    public function getRepos(): Collection
    {
        return $this->repos;
    }

    public function toArray(): array
    {
        return $this->repos->map(function (RepoDTO $repoDTO) {
            return $repoDTO->fromArray();
        })->toArray();
    }
}