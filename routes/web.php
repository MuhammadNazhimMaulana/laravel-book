<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Harga_Controller_A;

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

