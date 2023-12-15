<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cartController;
use App\Http\Controllers\sesiController;
use App\Http\Controllers\produkController;
use App\Http\Controllers\profilController;
use App\Http\Controllers\checkoutController;
use GuzzleHttp\Middleware;

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

Route::get('/login', [sesiController::class, 'halLogin'])->name('login');
Route::post('/login', [sesiController::class, 'login']);

Route::get('/register', [sesiController::class, 'halRegist']);
Route::post('/register', [sesiController::class, 'register']);

Route::get('/logout', [sesiController::class, 'logout']);

Route::get('/password-recovery', function () {
    return view('password-recovery');
});

Route::get('/profil_user/{id_pengguna}', [profilController::class, 'show'])->Middleware('auth');
// for update profile
Route::middleware(['auth'])->group(function () {
    Route::resources(['profil_user'=> profilController::class,]);
});

Route::get('/produk_pembeli', [produkController::class, 'produk_pembeli'])->Middleware('auth');


// ! PENJUAL

Route::get('/dashboard', function () {
    return view('admin-dashboard');
})->Middleware('jenisUser:Penjual');

// menampilkan produk yg dijual pembeli
Route::get('/dashboard/produk/{id_pengguna}', [produkController::class, 'create'])->name('produk-penjual')->Middleware('jenisUser:Penjual');

// menambahkan produk
Route::post('/dashboard/produk', [produkController::class, 'store'])->Middleware( 'jenisUser:Penjual');
Route::delete('/dashboard/produk/{id}', [produkController::class, 'destroy'])->Middleware( 'jenisUser:Penjual');

Route::get('/dashboard/produk/edit/{id}', [produkController::class, 'edit'])->Middleware( 'jenisUser:Penjual');
Route::put('/dashboard/produk/edit/{id}', [produkController::class, 'update'])->Middleware( 'jenisUser:Penjual');




// ! PEMBELI

Route::get('/produk-detail/{id}', [produkController::class, 'show'])->Middleware( 'auth');
Route::get('/checkout/{id_keranjang}', [checkoutController::class, 'index'])->Middleware('auth');
Route::patch('/checkout/alamat/{id_pengguna}', [checkoutController::class, 'alamat'])->Middleware('auth');
Route::post('/checkout/totalharga/haha}', [checkoutController::class, 'totalHarga'])->Middleware('auth');

Route::get('/keranjang/{id_pengguna}', [cartController::class, 'show'])->name('keranjang')->Middleware('auth');
Route::post('/keranjang/tambah/{id_pengguna}', [cartController::class, 'addToCart'])->Middleware('auth');
Route::delete('/keranjang/{id_pengguna}/{id_produk}', [cartController::class, 'destroy'])->middleware('auth');




