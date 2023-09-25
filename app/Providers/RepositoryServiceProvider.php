<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\DataRepositoryInterface;
use App\Repositories\DataRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(DataRepositoryInterface::class, DataRepository::class);
    }

    public function boot(): void
    {
        
    }
}
