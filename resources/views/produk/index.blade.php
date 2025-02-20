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
                        <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama_produk }}" class="card-img-top">
                        @else
                            <img src="images/default.jpg" alt="Default Image" class="card-img-top">
                        @endif
                    </a>
                    <div class="card-body p-2">
                        <h6 class="card-title fw-bold text-dark text-truncate">{{ $produk->nama_produk }}</h6>
                        <p class="text-muted small text-truncate">{{ Str::limit($produk->deskripsi, 40) }}</p>

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

<!-- Styling Katalog ala Shopee -->
<style>
    .product-card {
        border-radius: 10px;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s;
        background: #fff;
    }
    .product-card:hover {
        transform: scale(1.03);
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
    }
    .card-img-top {
        width: 100%;
        height: 180px;
        object-fit: cover;
        border-radius: 10px 10px 0 0;
    }
    .text-truncate {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
@endsection
