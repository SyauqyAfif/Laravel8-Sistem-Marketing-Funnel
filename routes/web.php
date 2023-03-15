<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\http\Controllers\ContentController;
use App\http\Controllers\HomeController;
use App\http\Controllers\MarketingController;
use App\http\Controllers\GrafikController;
use App\http\Controllers\LaporanController;

Route::get('/', function () {
    return view('login');
});

// Halaman Login dan Logout
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Halaman Register
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registerStore', [LoginController::class, 'registerStore'])->name('registerStore');

// Route User
Route::get('/user', [UserController::class, 'user'])->name('user');
Route::POST('user/store', [UserController::class, 'store']);
Route::POST('/user/{id}/update', [UserController::class, 'update']);
Route::get('/user/{id}/destroy', [UserController::class, 'destroy']);

Route::get('/home', [HomeController::class, 'home'])->name('home');

// Route CRUD Content
Route::get('/content', [ContentController::class, 'index'])->name('content');
Route::POST('content/store', [ContentController::class, 'store']);
Route::POST('/content/{id}/update', [ContentController::class, 'update']);
Route::get('/content/{id}/destroy', [ContentController::class, 'destroy']);

// Route CRUD Marketing
Route::get('/marketing', [MarketingController::class, 'index'])->name('marketing');
Route::POST('marketing/store', [MarketingController::class, 'store']);
Route::POST('/marketing/{id}/update', [MarketingController::class, 'update']);
Route::get('/marketing/{id}/destroy', [MarketingController::class, 'destroy']);

// Route CRUD Grafik
Route::get('/grafik', [GrafikController::class, 'index'])->name('grafik');
Route::POST('grafik/store', [GrafikController::class, 'store']);
Route::POST('/grafik/{id}/update', [GrafikController::class, 'update']);
Route::get('/grafik/{id}/destroy', [GrafikController::class, 'destroy']);

// Route Cetak Laporan
Route::get('/cetak_laporan', [LaporanController::class, 'cetak_laporan'])->middleware(['auth'])->name('cetak_laporan');
Route::get('cetak_laporan/{awal}/{akhir}', [LaporanController::class, 'cetaklaporan'])->name('cetak.laporan');
Route::get('/laporan/{tgl_awal}/{tgl_akhir}', [LaporanController::class, 'filter'])->name('laporan');
