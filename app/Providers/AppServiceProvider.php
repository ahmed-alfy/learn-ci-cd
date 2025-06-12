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
        \DB::listen(function ($query) {
            $sql = $query->sql;
            $bindings = $query->bindings;
            $executionTime = $query->time;

            \Log::info('SQL Query Executed:', [
                'sql' => $sql,
                'bindings' => $bindings,
                'execution_time' => $executionTime,
            ]);
        });
    }
}
