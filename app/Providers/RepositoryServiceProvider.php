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

        // Penulis
        $this->app->bind(
            'App\Interfaces\Admin\Penulis\PenulisInterface_Admin', 
            'App\Repositories\Admin\Penulis\PenulisRepository_Admin'
        );

        // Buku
        $this->app->bind(
            'App\Interfaces\Admin\Buku\BukuInterface_Admin', 
            'App\Repositories\Admin\Buku\BukuRepository_Admin'
        );

        // Utama
        $this->app->bind(
            'App\Interfaces\Admin\Dashboard\UtamaInterface_Admin', 
            'App\Repositories\Admin\Dashboard\UtamaRepository_Admin'
        );

        // Pembelian
        $this->app->bind(
            'App\Interfaces\Admin\Pembelian\PembelianInterface_Admin', 
            'App\Repositories\Admin\Pembelian\PembelianRepository_Admin'
        );

        // Keranjang Buku
        $this->app->bind(
            'App\Interfaces\Admin\Keranjang Buku\KeranjangBukuInterface_Admin', 
            'App\Repositories\Admin\Keranjang Buku\KeranjangBukuRepository_Admin'
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
