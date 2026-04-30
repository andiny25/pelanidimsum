<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTE
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home.index');

Route::post('/contact', [HomeController::class, 'store'])->name('contact.store');
Route::get('/produk/detail/{id}', [HomeController::class, 'show'])->name('produk.show_detail');

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login/kirim', [AuthController::class, 'login'])->name('login.kirim');

Route::get('/registrasi', [loginController::class, 'showRegistrationForm']);
Route::post('/registrasi', [loginController::class, 'registrasi']);

Route::get('auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

// forgot password
Route::get('auth/form/forget', [AuthController::class, 'show_forget_password'])->name('auth.forget');
Route::get('auth/forget', [AuthController::class, 'do_forget_password'])->name('auth.do-forget');
Route::post('auth/show/forget', [AuthController::class, 'show_forget_password'])->name('auth.show-forget');

/*
|--------------------------------------------------------------------------
| AFTER LOGIN
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => ['checkislogin']], function () {

    // dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // ✅ KASIR (BARU)
    Route::get('/kasir', function () {
        return view('admin.kasir.index');
    })->name('kasir.index');

    // pelanggan
    Route::get('pelanggan', [PelangganController::class, 'index'])->name('pelanggan.list');
    Route::get('pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');
    Route::post('pelanggan/store', [PelangganController::class, 'store'])->name('pelanggan.store');
    Route::get('pelanggan/edit/{param1}', [PelangganController::class, 'edit'])->name('pelanggan.edit');
    Route::post('pelanggan/update', [PelangganController::class, 'update'])->name('pelanggan.update');
    Route::get('pelanggan/destroy/{param1}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');

    // mitra
    Route::get('mitra', [MitraController::class, 'index'])->name('mitra.list');
    Route::get('mitra/create', [MitraController::class, 'create'])->name('mitra.create');
    Route::post('mitra/store', [MitraController::class, 'store'])->name('mitra.store');
    Route::get('mitra/edit/{id}', [MitraController::class, 'edit'])->name('mitra.edit');
    Route::post('/mitra/update', [MitraController::class, 'update'])->name('mitra.update');
    Route::get('mitra/destroy/{param1}', [MitraController::class, 'destroy'])->name('mitra.destroy');

    // produk
    Route::get('produk', [ProdukController::class, 'index'])->name('produk.list');
    Route::get('produk/create', [ProdukController::class, 'create'])->name('produk.create');
    Route::post('produk/store', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('produk/edit/{param1}', [ProdukController::class, 'edit'])->name('produk.edit');
    // Cari baris produk/update dan pastikan kodenya seperti ini:
    Route::post('produk/update/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');


});

/*
|--------------------------------------------------------------------------
| SUPER ADMIN ONLY
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => ['checkrole:Super Admin']], function () {
    Route::get('user', [UserController::class, 'index'])->name('user.list');
    Route::get('user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('user/edit/{param1}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('user/update', [UserController::class, 'update'])->name('user.update');
    Route::get('user/destroy/{param1}', [UserController::class, 'destroy'])->name('user.destroy');
});

Route::get('/kasir', [KasirController::class, 'index'])->name('kasir.index');

/*
|--------------------------------------------------------------------------
| GOOGLE LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/auth/redirect-google', [AuthController::class, 'redirectToGoogle'])->name('redirect.google');
Route::get('/oauthcallback', [AuthController::class, 'handleGoogleCallback']);

Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.riwayat');

Route::post('/kasir/store', [KasirController::class, 'store'])
    ->name('kasir.store');
    
  Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');