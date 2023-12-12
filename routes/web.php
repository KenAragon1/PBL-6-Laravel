<?php

use App\Http\Controllers\cartController;
use App\Http\Controllers\sesiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\produkController;
use App\Http\Controllers\profilController;

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

Route::get('/', [produkController::class, 'index']);

Route::get('/produk-detail/{id}', [produkController::class, 'show']);

Route::get('/login', [sesiController::class, 'halLogin']);
Route::post('/login', [sesiController::class, 'login']);

Route::get('/register', [sesiController::class, 'halRegist']);
Route::post('/register', [sesiController::class, 'register']);

Route::get('/logout', [sesiController::class, 'logout']);

Route::get('/signin', function () {
    return view('signIn');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/password-recovery', function () {
    return view('password-recovery');
});

Route::get('/profil_user/{id_pengguna}', [profilController::class, 'show']);
// Route::post('/profil_user/edit/{id_pengguna}', [profilController::class, 'update']);
Route::resourceS(['profil_user'=> profilController::class,]);

Route::get('/dashboard', function () {
    return view('admin-dashboard');
});


Route::get('/keranjang/{id_pengguna}', [cartController::class, 'show']);
Route::post('/keranjang/tambah/{id_pengguna}', [cartController::class, 'addToCart']);


Route::get('/produk_pembeli', [produkController::class, 'produk_pembeli']);

// admin


Route::get('/dashboard/produk', [produkController::class, 'create']);
Route::post('/dashboard/produk', [produkController::class, 'store']);
Route::delete('/dashboard/produk/{id}', [produkController::class, 'destroy']);

Route::get('/dashboard/produk/edit/{id}', [produkController::class, 'edit']);
Route::put('/dashboard/produk/edit/{id}', [produkController::class, 'update']);



