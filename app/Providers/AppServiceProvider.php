<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Http::macro('github', function () {
            return Http::baseUrl('https://api.github.com/users')->timeout(5);
        });

        Http::macro('omdb', function () {
            return Http::baseUrl('http://www.omdbapi.com?apikey=' . env('OMDB_API_KEY'))->timeout(10);
        });
    }
}
