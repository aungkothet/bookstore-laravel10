<?php

namespace App\Providers;

use App\Interfaces\AuthorRepositoryInterface;
use App\Interfaces\GenreRepositoryInterface;
use App\Repository\AuthorRepository;
use App\Repository\GenreRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AuthorRepositoryInterface::class, AuthorRepository::class);
        $this->app->bind(GenreRepositoryInterface::class, GenreRepository::class);
        
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
