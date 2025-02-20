@extends('layouts.main')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container mt-5">
    <!-- Hero Section -->
    <div class="hero-section text-center text-white">
        <h1 class="fw-bold fade-in">Dashboard Admin</h1>
        <p class="fade-in">Selamat datang, <strong>{{ $user->name }}</strong></p>
    </div>

    <!-- Statistik Kartu -->
    <div class="row mt-4 justify-content-center">
        <div class="col-md-4">
            <div class="card stat-card dark-card shadow">
                <div class="card-body text-center">
                    <i class="fas fa-box-open icon"></i>
                    <h5 class="card-title">Total Produk</h5>
                    <p class="card-text fs-3">{{ $jumlahProduk }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card stat-card gray-card shadow">
                <div class="card-body text-center">
                    <i class="fas fa-th-list icon"></i>
                    <h5 class="card-title">Total Kategori</h5>
                    <p class="card-text fs-3">{{ $jumlahKategori }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card stat-card light-card shadow">
                <div class="card-body text-center">
                    <i class="fas fa-users icon"></i>
                    <h5 class="card-title">Total User</h5>
                    <p class="card-text fs-3">{{ $jumlahUser }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Button Keluar -->
    <div class="text-center mt-4">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-dark btn-lg exit-btn">Keluar</button>
        </form>
    </div>
</div>

<!-- Styling -->
<style>
    /* Hero Section */
    .hero-section {
        background: linear-gradient(135deg, #2c2c2c, #1a1a1a);
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
        animation: fadeIn 1s ease-in-out;
    }

    /* Animasi Hero */
    .fade-in {
        animation: fadeIn 1s ease-in-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Kartu Statistik */
    .stat-card {
        color: white;
        border-radius: 10px;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s;
    }
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 8px 18px rgba(255, 255, 255, 0.15);
    }

    /* Warna Berbeda untuk Setiap Kartu */
    .dark-card {
        background: #1a1a1a;
    }
    .gray-card {
        background: #666;
    }
    .light-card {
        background: #ddd;
        color: #333;
    }

    /* Ikon dalam Kartu */
    .icon {
        font-size: 40px;
        margin-bottom: 10px;
        color: #bfbfbf;
    }

    /* Tombol Keluar */
    .exit-btn {
        background: #333;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        transition: background 0.3s ease-in-out, transform 0.2s;
        color: white;
    }
    .exit-btn:hover {
        background: #1a1a1a;
        transform: scale(1.05);
    }
</style>
@endsection
