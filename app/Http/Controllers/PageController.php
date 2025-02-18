<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }
    public function about()
    {
        return view('about');
    }
    
    public function katalog()
    {
        $produk = Produk::all();
        return view('katalog', compact('produk'));
    }

    public function tentang()
    {
        return view('tentang');
    }
}
