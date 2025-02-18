<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::with('kategori')->get();
        return view('produk.index', compact('produk'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_produk' => 'required|string|max:10',
            'nama_produk' => 'required|string|max:50',
            'kategori_id' => 'required|exists:kategori,id',
            'deskripsi' => 'required|string',
            'gambar' => 'image|nullable|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('produk', 'public');
        }

        Produk::create($data);
        return redirect()->route('produk.index');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('produk.index');
    }
}
