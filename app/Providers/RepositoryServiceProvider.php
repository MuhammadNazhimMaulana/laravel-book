<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Harga
        $this->app->bind(
            'App\Interfaces\Admin\Harga\HargaInterface_Admin', 
            'App\Repositories\Admin\Harga\HargaRepository_Admin'
        );

        // Genre
        $this->app->bind(
            'App\Interfaces\Admin\Genre\GenreInterface_Admin', 
            'App\Repositories\Admin\Genre\GenreRepository_Admin'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
