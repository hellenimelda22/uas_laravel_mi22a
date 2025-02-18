@extends('layouts.main')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">Dashboard Admin</h2>
            <p class="text-center">Selamat datang, <strong>{{ $user->name }}</strong></p>
            
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card text-white bg-primary">
                        <div class="card-body">
                            <h5 class="card-title">Total Produk</h5>
                            <p class="card-text fs-3">{{ $jumlahProduk }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card text-white bg-success">
                        <div class="card-body">
                            <h5 class="card-title">Total Kategori</h5>
                            <p class="card-text fs-3">{{ $jumlahKategori }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card text-white bg-danger">
                        <div class="card-body">
                            <h5 class="card-title">Total User</h5>
                            <p class="card-text fs-3">{{ $jumlahUser }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('logout') }}" class="btn btn-danger">Keluar</a>
            </div>
        </div>
    </div>
</div>
@endsection
