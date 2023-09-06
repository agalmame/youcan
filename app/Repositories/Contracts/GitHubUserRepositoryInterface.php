<?php

namespace App\Repositories\Contracts;

interface GitHubUserRepositoryInterface
{
    public function users(?int $limit, ?int $page): array;
}