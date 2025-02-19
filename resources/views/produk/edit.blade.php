@extends('layouts.main')

@section('title', 'Edit Produk')

@section('content')
<div class="container mt-5">
    <h1 class="text-center fw-bold text-dark mb-4">Edit Produk</h1>

    <!-- Form Edit Produk -->
    <div class="card p-4 shadow-sm rounded-4 border-0">
        <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="fw-bold">Nama Produk</label>
                <input type="text" class="form-control border-0 shadow-sm" name="nama_produk" value="{{ $produk->nama_produk }}" required>
            </div>

            <div class="mb-3">
                <label class="fw-bold">Deskripsi</label>
                <textarea class="form-control border-0 shadow-sm" name="deskripsi" required>{{ $produk->deskripsi }}</textarea>
            </div>

            <div class="mb-3">
                <label class="fw-bold">Kategori</label>
                <select class="form-control border-0 shadow-sm" name="kategori_id" required>
                    @foreach($kategori as $k)
                        <option value="{{ $k->id }}" {{ $produk->kategori_id == $k->id ? 'selected' : '' }}>
                            {{ $k->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="fw-bold">Upload Gambar (Opsional)</label>
                <input type="file" class="form-control border-0 shadow-sm" name="gambar">
                @if($produk->gambar)
                    <img src="{{ asset('storage/' . $produk->gambar) }}" class="mt-3 img-thumbnail" width="150">
                @endif
            </div>

            <button type="submit" class="btn btn-dark rounded-pill px-4">Simpan Perubahan</button>
            <a href="{{ route('produk.index') }}" class="btn btn-secondary rounded-pill px-4">Batal</a>
        </form>
    </div>
</div>
@endsection
