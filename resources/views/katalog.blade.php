@extends('layouts.main')

@section('title', 'Katalog')

@section('content')
<div class="container mt-5">
    <h1 class="text-center fw-bold text-dark mb-4">Katalog Produk</h1>

    <div class="row">
        @foreach($produk as $p)
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0 rounded-4">
                <!-- Tambahkan gambar produk -->
                <img src="{{ asset('storage/' . $p->gambar) }}" class="card-img-top img-fluid" alt="{{ $p->nama_produk }}" style="height: 250px; object-fit: cover; border-top-left-radius: 12px; border-top-right-radius: 12px;">

                <div class="card-body text-center">
                    <h5 class="card-title fw-bold text-dark">{{ $p->nama_produk }}</h5>
                    <p class="text-muted">Kode: {{ $p->kode_produk }}</p>
                    <p>{{ $p->deskripsi }}</p>
                </div>
            </div>
        </div>
        @endforeach
   