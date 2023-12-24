<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cartController;
use App\Http\Controllers\sesiController;
use App\Http\Controllers\produkController;
use App\Http\Controllers\profilController;
use App\Http\Controllers\checkoutController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\pesananPenjual;
use App\Http\Controllers\transaksiController;
use App\Models\transaksi;
use GuzzleHttp\Middleware;
use Whoops\Run;

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
Route::post('/dashboard/produk/tambah', [produkController::class, 'store'])->Middleware( 'jenisUser:Penjual');
Route::delete('/dashboard/produk/delete/{id}', [produkController::class, 'destroy'])->Middleware( 'jenisUser:Penjual');

Route::get('/dashboard/produk/edit/{id}', [produkController::class, 'edit'])->Middleware( 'jenisUser:Penjual');
Route::put('/dashboard/produk/edit/{id}', [produkController::class, 'update'])->Middleware( 'jenisUser:Penjual');

// Pesanan
Route::get('/dashboard/pesanan', [pesananPenjual::class, 'pesanan'])->middleware('jenisUser:Penjual');
Route::get('/dashboard/detail_pesanan/{id}', [pesananPenjual::class, 'detail'])->middleware('jenisUser:Penjual');
Route::get('/mengirimPesanan/{id}', [pesananPenjual::class, 'kirim'])->middleware('jenisUser:Penjual');

Route::get('/dashboard/riwayatPesanan', [pesananPenjual::class, 'riwayatPesanan'])->middleware('jenisUser:Penjual');

// search

//kategori
Route::post('/dashboard/tambahKategori', [KategoriController::class, 'tambah'])->middleware('auth');
Route::get('/kategori', [KategoriController::class, 'tampil'])->middleware('auth');
Route::get('/produk/kategori/{id}', [KategoriController::class, 'tampilKategori'])->middleware('auth');
Route::get('/cari-produk', [produkController::class, 'cariProduk']);


// ! PEMBELI

Route::get('/produk-detail/{id}', [produkController::class, 'show'])->Middleware( 'auth');
Route::get('/checkout', [checkoutController::class, 'test'])->Middleware('auth');
Route::patch('/checkout/alamat/{id_pengguna}', [checkoutController::class, 'alamat'])->Middleware('auth');

Route::get('/keranjang', [cartController::class, 'show'])->name('keranjang')->Middleware('auth');
Route::post('/keranjang/tambah/{id_produk}', [cartController::class, 'addToCart'])->Middleware('auth');
Route::get('/keranjang/edit/{id}', [cartController::class, 'editCart'])->Middleware('auth');
Route::post('/keranjang/editCart/{id}', [cartController::class, 'updateCart'])->Middleware('auth');
Route::delete('/keranjang/{id_pengguna}/{id_produk}', [cartController::class, 'destroy'])->middleware('auth');

Route::post('/transaksi/pemesanan', [transaksiController::class, 'store'])->middleware('auth');
Route::post('/pemesanan', [transaksiController::class, 'buatPesanan'])->middleware('auth');
Route::get('/transaksi/pemesanan/bukti_pembayaran', function(){
    echo "Silahkan Lengkapi Bukti Pembayaran";
})->middleware('auth');

// kelola pemesanan pembeli
Route::get('/pesanan', [transaksiController::class, 'daftarPesanan'])->middleware('auth');
Route::get('/pesanan/bukti_pembayaran/{id}', [transaksiController::class, 'buktiBayar'])->middleware('auth');
Route::patch('/pesanan/uploadBukti/{id}', [transaksiController::class, 'uploadBukti'])->middleware('auth');
Route::get('/detail_pesanan/{id_pemesanan}', [transaksiController::class, 'detailPesanan'])->middleware('auth');
Route::get('/pesananSiap/{id}', [pesananPenjual::class, 'terima'])->middleware('auth');
Route::post('/pesananSiap/selesai', [pesananPenjual::class, 'simpanRiwayat'])->middleware('auth');

Route::get('/riwayat_pesanan', [pesananPenjual::class, 'riwayat'])->middleware('auth');





