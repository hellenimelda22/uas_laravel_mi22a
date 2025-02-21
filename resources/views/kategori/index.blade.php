@extends('layouts.main')

@section('title', 'Kategori')

@section('content')
<div class="container mt-5">
    <h1 class="text-center fw-bold text-dark">📂 Daftar Kategori</h1>
    <p class="text-center text-muted">Kelola kategori produk dengan mudah dan cepat</p>

    <!-- Pesan sukses -->
    @if(session('success'))
        <div class="alert alert-success text-center shadow-sm rounded-pill">{{ session('success') }}</div>
    @endif

    <!-- Form Tambah Kategori -->
    <div class="card p-4 shadow-sm border-0 rounded-4 mb-4 add-category">
        <h5 class="fw-semibold text-dark text-center">Tambah Kategori Baru</h5>
        <form action="{{ route('kategori.store') }}" method="POST">
            @csrf
            <div class="input-group">
                <input type="text" class="form-control border-0 shadow-sm" name="nama_kategori" placeholder="Masukkan Nama Kategori" required>
                <button type="submit" class="btn btn-dark rounded-pill px-4">➕ Tambah</button>
            </div>
        </form>
    </div>

    <!-- Grid Daftar Kategori -->
    <div class="row row-cols-2 row-cols-md-4 g-3">
        @foreach($kategori as $k)
        <div class="col">
            <div class="card category-card border-0 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="fw-bold text-dark">{{ $k->nama_kategori }}</h5>
                    <form action="{{ route('kategori.destroy', $k->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm rounded-pill mt-2">❌ Hapus</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Styling Halaman Kategori -->
<style>
    /* Form Tambah Kategori */
    .add-category {
        background: linear-gradient(135deg, #f7f7f7, #ffffff);
        border-left: 5px solid #333;
    }

    /* Kartu Kategori */
    .category-card {
        border-radius: 12px;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s;
        background: linear-gradient(135deg, #ececec, #ffffff);
        padding: 20px;
    }
    
    .category-card:hover {
        transform: scale(1.05);
        box-shadow: 0px 8px 18px rgba(0, 0, 0, 0.1);
    }

    /* Animasi hover pada tombol */
    .btn-danger {
        transition: background 0.3s ease-in-out;
    }
    
    .btn-danger:hover {
        background: #d9534f;
    }
</style>
@endsection
