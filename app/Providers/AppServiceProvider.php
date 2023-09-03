<?php

namespace App\Providers;

use App\Repositories\Contracts\RepoRepositoryInterface;
use App\Repositories\GitHub\GitHubRepoRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(RepoRepositoryInterface::class, GitHubRepoRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
