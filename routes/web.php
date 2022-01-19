<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{Harga_Controller_A, Genre_Controller_A, Penulis_Controller_A, Buku_Controller_A};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('/harga')->group(function () {
    Route::get('/', [Harga_Controller_A::class, 'get_harga']);
    Route::get('/create', [Harga_Controller_A::class, 'tambah_harga']);
    Route::post('/create', [Harga_Controller_A::class, 'save_harga']);
    Route::get('/update/{id}', [Harga_Controller_A::class, 'update_harga']);
    Route::put('/update/{id}', [Harga_Controller_A::class, 'save_update']);
    Route::delete('/delete/{id}', [Harga_Controller_A::class, 'delete_harga']);
});

Route::prefix('/penulis')->group(function () {
    Route::get('/', [Penulis_Controller_A::class, 'get_penulis']);
    Route::get('/create', [Penulis_Controller_A::class, 'tambah_penulis']);
    Route::post('/create', [Penulis_Controller_A::class, 'save_penulis']);
    Route::get('/update/{id}', [Penulis_Controller_A::class, 'update_penulis']);
    Route::put('/update/{id}', [Penulis_Controller_A::class, 'save_update']);
    Route::delete('/delete/{id}', [Penulis_Controller_A::class, 'delete_penulis']);
});

Route::prefix('/genre')->group(function () {
    Route::get('/', [Genre_Controller_A::class, 'get_genre']);
    Route::get('/create', [Genre_Controller_A::class, 'tambah_genre']);
    Route::post('/create', [Genre_Controller_A::class, 'save_genre']);
    Route::get('/update/{id}', [Genre_Controller_A::class, 'update_genre']);
    Route::put('/update/{id}', [Genre_Controller_A::class, 'save_update']);
    Route::delete('/delete/{id}', [Genre_Controller_A::class, 'delete_genre']);
});

