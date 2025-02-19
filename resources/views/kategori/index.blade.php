@extends('layouts.main')

@section('title', 'Kategori')

@section('content')
<div class="container mt-4">
    <h1 class="text-center text-dark fw-bold">Daftar Kategori</h1>

    <!-- Pesan sukses -->
    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <!-- Form Tambah Kategori -->
    <div class="card p-4 shadow-sm border-0 rounded-4 mb-4">
        <h5 class="fw-semibold text-secondary">Tambah Kategori Baru</h5>
        <form action="{{ route('kategori.store') }}" method="POST">
            @csrf
            <div class="input-group">
                <input type="text" class="form-control border-0 shadow-sm" name="nama_kategori" placeholder="Masukkan Nama Kategori" required>
                <button type="submit" class="btn btn-dark rounded-pill px-4">Tambah</button>
            </div>
        </form>
    </div>

    <!-- Kartu Daftar Kategori -->
    <div class="row">
        @foreach($kategori as $k)
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0 rounded-4 category-card">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold text-dark">{{ $k->nama_kategori }}</h5>
                    <form action="{{ route('kategori.destroy', $k->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm rounded-pill mt-2">
                            ❌ Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Animasi Hover -->
<style>
    .category-card {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s;
        background: linear-gradient(135deg, rgb(174, 177, 180), #ffffff);
    }
    .category-card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15);
    }
</style>

@endsection
