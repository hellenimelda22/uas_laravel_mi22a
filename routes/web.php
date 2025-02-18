<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
 


// Halaman utama
Route::get('/', [PageController::class, 'home']);

// Halaman umum
Route::get('/katalog', [PageController::class, 'katalog']);
Route::get('/tentang', [PageController::class, 'tentang'])->name('tentang');
Route::get('/about', [PageController::class, 'about'])->name('about');


// Grup rute untuk tamu (belum login)

    Route::get('/login', [AuthController::class, 'showLogin']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'processlogin']);
    
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'processRegister'])->name('register.process');

// Dashboard Admin (hanya untuk pengguna yang sudah login)
Route::get('/dashboard', function () {
    return Auth::check() ? redirect()->route('tentang') : redirect()->route('login');
})->name('dashboard');

// Grup rute untuk admin (butuh autentikasi)
Route::middleware('auth')->group(function () {
    // Manajemen Kategori
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::post('/kategori', [KategoriController::class, 'store']);
    Route::delete('/kategori/{kategori}', [KategoriController::class, 'destroy']);

    // Manajemen Produk
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::post('/produk', [ProdukController::class, 'store']);
    Route::delete('/produk/{produk}', [ProdukController::class, 'destroy']);
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});
