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
                    <div class="card bg-dark text-white shadow">
                        <div class="card-body">
                            <h5 class="card-title">Total Produk</h5>
                            <p class="card-text fs-3">{{ $jumlahProduk }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card bg-secondary text-white shadow">
                        <div class="card-body">
                            <h5 class="card-title">Total Kategori</h5>
                            <p class="card-text fs-3">{{ $jumlahKategori }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card bg-light text-dark shadow">
                        <div class="card-body">
                            <h5 class="card-title">Total User</h5>
                            <p class="card-text fs-3">{{ $jumlahUser }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Button Keluar Berwarna Hitam -->
            <div class="text-center mt-4">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-dark px-4 py-2">Keluar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
