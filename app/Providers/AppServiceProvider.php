<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\{AuthInterface, AuthRepository, BookInterface, BookRepository};
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthInterface::class, AuthRepository::class);
        $this->app->bind(BookInterface::class, BookRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
