<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
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
        // Check database connection.
        try {
            DB::connection()->getPDO();
            dump('Database is connected. Database Name is : '.DB::connection()->getDatabaseName());
        } catch (Exception $e) {
            dump('Database connection failed');
        }
    }
}
