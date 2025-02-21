@extends('layouts.main')

@section('title', 'Tambah Produk')

@section('content')
<div class="container mt-5">
    <h1 class="text-center fw-bold text-dark mb-4">Tambah Produk</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
             <label for="kode_produk" class="form-label">Kode Produk</label>
             <input type="text" class="form-control" name="kode_produk" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Nama Produk</label>
            <input type="text" class="form-control" name="nama_produk" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Kategori</label>
            <select class="form-control" name="kategori_id" required>
                @foreach($kategori as $k)
                    <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Upload Gambar </label>
            <input type="file" class="form-control" name="gambar">
        </div>

        <button type="submit" class="btn btn-dark">Simpan</button>
    </form>
</div>
@endsection
