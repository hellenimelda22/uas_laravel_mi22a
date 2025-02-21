@extends('layouts.main')

@section('title', 'Katalog Produk')

@section('content')
<div class="container mt-5">
    <h1 class="text-center fw-bold text-dark mb-4">🛍 Katalog Produk</h1>

    <!-- Tampilkan Pesan Sukses -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <strong>🎉 Sukses!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Tombol Tambah Produk (Hanya untuk Admin) -->
    @auth
        <div class="text-end mb-4">
            <a href="{{ route('produk.create') }}" class="btn btn-dark rounded-pill px-4">➕ Tambah Produk</a>
        </div>
    @endauth

    <!-- Grid Katalog Produk -->
    <div class="row row-cols-2 row-cols-md-5 g-3"> 
        @foreach ($produks as $produk)
            <div class="col">
                <div class="card product-card border-0 shadow-sm">
                    <!-- Gambar Produk -->
                    <a href="#" class="text-decoration-none">
                        @if ($produk->gambar)
                        <img src="{{ asset('storage/'. $produk->gambar) }}" alt="{{ $produk->nama_produk }}" class="card-img-top">
                        @else
                            <img src="{{ asset('images/default.jpg') }}" alt="Default Image" class="card-img-top">
                        @endif
                    </a>
                    <div class="card-body p-2">
                        <h6 class="card-title fw-bold text-dark">{{ $produk->nama_produk }}</h6>
                        <p class="text-muted small">{{ Str::limit($produk->deskripsi, 40) }}</p>

                        <!-- Tombol Edit & Hapus (Hanya Admin) -->
                        @auth
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-warning btn-sm rounded-pill px-3">✏ Edit</a>

                            <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm rounded-pill px-3">❌ Hapus</button>
                            </form>
                        </div>
                        @endauth
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Styling Grid Katalog -->
<style>
    /* Menyesuaikan tinggi grid */
    .product-card {
        border-radius: 8px;
        transition: transform 0.2s ease-in-out, box-shadow 0.2s;
        background: #fff;
        min-height: 500px; /* Menyesuaikan tinggi card */
    }

    .product-card:hover {
        transform: scale(1.02);
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
    }

    /* Menyesuaikan tinggi gambar agar tidak kepotong */
    .card-img-top {
        width: 100%;
        height: 350px; /* Ukuran gambar lebih kecil */
        object-fit: cover;
        border-radius: 8px 8px 0 0;
    }

    /* Mengurangi tinggi body agar tetap proporsional */
    .card-body {
        padding: 10px;
    }
</style>
@endsection
