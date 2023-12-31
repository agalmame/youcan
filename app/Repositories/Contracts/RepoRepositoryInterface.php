<?php

namespace App\Repositories\Contracts;


interface RepoRepositoryInterface
{
    public function myRepo(): array;

    public function getRepo(string $owner, string $repo): array;

}