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
Route::get('logout', [PageController::class, 'logout'])->name('logout');

// Halaman umum
Route::get('/katalog', [PageController::class, 'katalog']);
Route::get('/katalog', [ProdukController::class, 'index'])->name('katalog');
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
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // Redirect ke halaman Home
})->name('logout');

// Grup rute untuk admin (butuh autentikasi)
Route::middleware('auth')->group(function () {
    // Manajemen Kategori
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
    // Manajemen Produk
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::post('/produk', [ProdukController::class, 'store']);
    Route::delete('/produk/{produk}', [ProdukController::class, 'destroy']);
    Route::resource('/admin/produk', ProdukController::class);
    Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit')->middleware('auth');
});
// Route CRUD Produk (Pastikan ada)
Route::resource('produk', ProdukController::class)->middleware('auth');
Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
// Tambahkan route DELETE untuk menghapus produk
Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy')->middleware('auth');
Route::resource('produk', ProdukController::class)->middleware('auth');
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::put('/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');

