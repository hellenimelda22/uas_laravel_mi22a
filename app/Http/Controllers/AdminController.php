<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'total_produk' => Produk::count(),
            'total_kategori' => Kategori::count(),
            'total_user' => User::count(),
            'user' => auth()->user()
        ]);
    }
}
