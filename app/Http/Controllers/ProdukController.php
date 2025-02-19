<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;


class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Hanya bisa diakses setelah login
    }


    public function index()
    {
        $produks = Produk::all(); // Ambil semua produk dari database
        return view('produk.index', compact('produks')); // Kirim data ke view
    }
    

    public function create()
    {
        $kategori = Kategori::all();
        return view('produk.create', compact('kategori'));
    }

    public function store(Request $request)
{
    $request->validate([
        'kode_produk' => 'required|unique:produk,kode_produk',
        'nama_produk' => 'required',
        'kategori_id' => 'required',
        'deskripsi' => 'nullable',
        'gambar' => 'nullable|image|max:2048'
    ]);

    Produk::create([
        'kode_produk' => $request->kode_produk,
        'nama_produk' => $request->nama_produk,
        'kategori_id' => $request->kategori_id,
        'deskripsi' => $request->deskripsi,
        'gambar' => $request->file('gambar') ? $request->file('gambar')->store('produk') : null
    ]);

    return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
}

    public function edit($id)
{
    $produk = Produk::findOrFail($id);
    $kategori = Kategori::all(); // Ambil semua kategori untuk dropdown

    return view('produk.edit', compact('produk', 'kategori'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama_produk' => 'required',
        'deskripsi' => 'required',
        'kategori_id' => 'required',
        'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $produk = Produk::findOrFail($id);
    $produk->nama_produk = $request->nama_produk;
    $produk->deskripsi = $request->deskripsi;
    $produk->kategori_id = $request->kategori_id;

    // Jika ada gambar baru, simpan ke storage
    if ($request->hasFile('gambar')) {
        $gambarPath = $request->file('gambar')->store('produk', 'public');
        $produk->gambar = $gambarPath;
    }

    $produk->save();

    return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui!');
}
public function destroy($id)
{
    $produk = Produk::findOrFail($id); // Cari produk berdasarkan ID
    $produk->delete(); // Hapus produk dari database

    return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus!');
}

}