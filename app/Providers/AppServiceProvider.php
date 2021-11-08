<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $this->loadMigrationsFrom([
            database_path() . DIRECTORY_SEPARATOR . 'migrations' . DIRECTORY_SEPARATOR . 'Feature',
            database_path() . DIRECTORY_SEPARATOR . 'migrations' . DIRECTORY_SEPARATOR . 'Hall',
            database_path() . DIRECTORY_SEPARATOR . 'migrations' . DIRECTORY_SEPARATOR . 'Service',
            database_path() . DIRECTORY_SEPARATOR . 'migrations' . DIRECTORY_SEPARATOR . 'User',
            database_path() . DIRECTORY_SEPARATOR . 'migrations' . DIRECTORY_SEPARATOR . 'Occasion',
            database_path() . DIRECTORY_SEPARATOR . 'migrations' . DIRECTORY_SEPARATOR . 'Type Hall',
            database_path() . DIRECTORY_SEPARATOR . 'migrations' . DIRECTORY_SEPARATOR . 'Activity',
        ]);
    }
}