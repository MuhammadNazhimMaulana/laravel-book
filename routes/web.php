<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{Harga_Controller_A, Genre_Controller_A, Penulis_Controller_A, Buku_Controller_A, Utama_A, Pembelian_Controller_A, Keranjang_Controller_A};
use App\Http\Controllers\Auth\Auth_Controller_A;

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

// Auth Admin
Route::middleware('guest')->prefix('/admin')->group(function () {
    Route::get('/login', [Auth_Controller_A::class, 'login'])->name('login');
    Route::post('/login', [Auth_Controller_A::class, 'authLogin']);
    Route::get('/register', [Auth_Controller_A::class, 'register']);
    Route::post('/register', [Auth_Controller_A::class, 'storeRegister']);
});

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
    Route::get('/excel', [Penulis_Controller_A::class, 'get_penulis_excel']);
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

Route::prefix('/buku')->group(function () {
    Route::get('/', [Buku_Controller_A::class, 'get_buku']);
    Route::get('/create', [Buku_Controller_A::class, 'tambah_buku']);
    Route::post('/create', [Buku_Controller_A::class, 'save_buku']);
    Route::get('/update/{id}', [Buku_Controller_A::class, 'update_buku']);
    Route::put('/update/{id}', [Buku_Controller_A::class, 'save_update']);
    Route::delete('/delete/{id}', [Buku_Controller_A::class, 'delete_buku']);
});

Route::prefix('/pembelian')->group(function () {
    Route::get('/', [Pembelian_Controller_A::class, 'get_pembelian']);
    Route::get('/create', [Pembelian_Controller_A::class, 'save_pembelian']);
    Route::put('/update/{id}', [Pembelian_Controller_A::class, 'save_update']);
    Route::get('/payment/{id}', [Pembelian_Controller_A::class, 'payment']);
    Route::delete('/delete/{id}', [Pembelian_Controller_A::class, 'delete_pembelian']);
});

Route::prefix('/keranjang-buku')->group(function () {
    Route::get('/', [Keranjang_Controller_A::class, 'get_keranjang']);
    Route::get('/{id}', [Keranjang_Controller_A::class, 'view_keranjang']);
    Route::post('/create', [Keranjang_Controller_A::class, 'tambah_keranjang']);
    Route::put('/update/{id}', [Keranjang_Controller_A::class, 'save_update']);
    Route::delete('/delete/{id}', [Keranjang_Controller_A::class, 'delete_keranjang']);
});

// Auth Admin
Route::prefix('/admin')->group(function () {
    Route::post('/logout', [Auth_Controller_A::class, 'logout']);
});

Route::prefix('/dashboard')->group(function () {
    Route::get('/', [Utama_A::class, 'utama']);
});

