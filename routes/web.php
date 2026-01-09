<?php

use Illuminate\Support\Facades\Route;
// TODO: Import controllers yang sudah dibuat
use App\Http\Controllers\KamarController;
use App\Http\Controllers\PenyewaController;
use App\Http\Controllers\KontrakSewaController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\DashboardController;

// TODO: Route untuk Dashboard (halaman utama)
Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


// TODO: Resource routes untuk CRUD Kamar
Route::resource('kamar', KamarController::class);

// TODO: Resource routes untuk CRUD Penyewa
Route::resource('penyewa', PenyewaController::class);

// TODO: Resource routes untuk CRUD Kontrak Sewa
Route::resource('kontrak-sewa', KontrakSewaController::class);

// TODO: Resource routes untuk CRUD Pembayaran
Route::resource('pembayaran', PembayaranController::class);


