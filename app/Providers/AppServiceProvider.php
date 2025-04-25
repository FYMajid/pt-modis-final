<?php

namespace App\Providers;

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
        if (!function_exists('str_limit')) {
            function str_limit($value, $limit = 100, $end = '...')
            {
                return Str::limit($value, $limit, $end);
            }
        }
    }
}
