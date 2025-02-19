@extends('layouts.main')

@section('title', 'Katalog')

@section('content')
<div class="container mt-5">
    <h1 class="text-center fw-bold text-dark mb-4">Katalog Produk</h1>

    <div class="row">
    @foreach($produk as $p)
<div class="col-md-4 mb-3">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body text-center">
            <h5 class="card-title fw-bold text-dark">{{ $p->nama_produk }}</h5>
            <p class="text-muted">Kode: {{ $p->kode_produk }}</p>
            <p>{{ $p->deskripsi }}</p>
        </div>
    </div>
</div>
@endforeach
         