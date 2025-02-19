@extends('layouts.main')

@section('title', 'Katalog Produk')

@section('content')
<div class="container mt-5">
    <h1 class="text-center fw-bold text-dark mb-4">Katalog Produk</h1>

    <!-- Tampilkan Pesan Sukses -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <strong>🎉 Sukses!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
<!-- Tombol Tambah Produk (Hanya untuk Admin) -->
@auth
        <a href="{{ route('produk.create') }}" class="btn btn-dark rounded-pill px-4 mb-4">Tambah Produk</a>
    @endauth
    <!-- Daftar Produk -->
    <div class="row">
        @foreach ($produks as $produk)
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm border-0 rounded-4 product-card">
                    <div class="card-body text-center">
                        <!-- Gambar Produk (Opsional) -->
                        @if ($produk->gambar)
                            <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama_produk }}" class="img-fluid rounded-3 mb-2" style="max-height: 150px;">
                        @else
                            <img src="{{ asset('images/default.jpg') }}" alt="Default Image" class="img-fluid rounded-3 mb-2" style="max-height: 150px;">
                        @endif

                        <h5 class="card-title fw-bold text-dark">{{ $produk->nama_produk }}</h5>
                        <p class="text-muted">{{ $produk->deskripsi }}</p>

                        <!-- Tombol Edit -->
                        <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-warning btn-sm rounded-pill">✏ Edit</a>

                        <!-- Form Hapus Produk -->
                        <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm rounded-pill" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">❌ Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Animasi Hover & Styling -->
<style>
    .product-card {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s;
        background: linear-gradient(135deg, rgb(220, 220, 220), #ffffff);
    }
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15);
    }
</style>
@endsection