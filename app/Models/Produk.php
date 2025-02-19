<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk'; // Nama tabel di database
    protected $fillable = ['kode_produk', 'nama_produk', 'kategori_id', 'deskripsi', 'gambar'];
}

