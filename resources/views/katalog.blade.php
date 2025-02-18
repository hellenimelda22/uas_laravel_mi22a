@extends('layouts.main')

@section('title', 'Katalog')

@section('content')
    <h2>Katalog Produk</h2>
    <div class="row">
        @foreach ($produk as $item)
        <div class="col-md-4">
            <div class="card mb-3">
                <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->nama_produk }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->nama_produk }}</h5>
                    <p class="card-text">{{ $item->deskripsi }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
