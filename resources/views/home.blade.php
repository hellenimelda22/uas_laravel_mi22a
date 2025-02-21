@extends('layouts.main')

@section('title', 'Home')

@section('content')
<div class="hero">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1 class="hero-title">Selamat Datang di <b>Tukuklamby</b></h1>
        <p class="hero-subtitle">Temukan koleksi busana terbaik dengan harga spesial! ✨</p>
        <a href="{{ route('katalog') }}" class="btn btn-light btn-lg shadow-sm rounded-pill mt-3">🛍 Lihat Katalog</a>
    </div>
</div>

<!-- Styling -->
<style>
    /* Hero Section */
    .hero {
        position: relative;
        width: 100%;
        height: 80vh;
        background: url("{{ asset('images/home-bg.jpg') }}") no-repeat center center/cover;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
    }

    .hero-overlay {
        position: absolute;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
    }

    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 600px;
    }

    .hero-title {
        font-size: 2.5rem;
        font-weight: bold;
        text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
        animation: fadeIn 1.5s ease-in-out;
    }

    .hero-subtitle {
        font-size: 1.2rem;
        margin-top: 10px;
        opacity: 0.9;
        animation: fadeIn 1.8s ease-in-out;
    }

    /* Tombol Katalog */
    .btn-light {
        background: #fff;
        color: #333;
        font-weight: bold;
        transition: 0.3s;
    }

    .btn-light:hover {
        background: #f8d90f;
        color: #222;
        transform: scale(1.05);
    }

    /* Animasi */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection
