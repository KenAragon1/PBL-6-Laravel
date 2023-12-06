<?php

use App\Http\Controllers\sesiController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/produk-detail', function () {
    return view('produk-detail');
});

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

Route::get('/profil-user', function () {
    return view('profil-user');
});

Route::get('/dashboard/produk', function () {
    return view('admin-produk');
});

Route::get('/keranjang', function () {
    return view('keranjang');
});


