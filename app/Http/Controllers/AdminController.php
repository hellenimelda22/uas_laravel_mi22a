<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Produk;
use App\Models\Kategori;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Mendapatkan data user yang login
        $jumlahProduk = Produk::count(); // Menghitung jumlah produk
        $jumlahKategori = Kategori::count(); // Menghitung jumlah kategori
        $jumlahUser = User::count(); // Menghitung jumlah user

        return view('admin.dashboard', compact('user', 'jumlahProduk', 'jumlahKategori', 'jumlahUser'));
    }
}
