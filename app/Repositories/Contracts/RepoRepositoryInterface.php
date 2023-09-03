<?php

namespace App\Repositories\Contracts;


interface RepoRepositoryInterface
{
    public function MyRepo(): array;

    public function getRepo(string $owner, string $repo): array;

}