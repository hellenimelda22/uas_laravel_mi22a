@extends('layouts.main')

@section('title', 'Tentang Kami')

@section('content')
<div class="container mt-5">
    <div class="text-center">
        <h1 class="fw-bold text-dark">✨ Tentang Kami ✨</h1>
        <p class="text-muted">Kami adalah tim kreatif di balik butik <b>"Tukuklamby"</b>, menghadirkan pengalaman belanja terbaik.</p>
    </div>

    <!-- Hero Banner -->
    <div class="hero-banner mt-4 mb-5">
        <div class="overlay"></div>
        <div class="hero-text">
            <h2 class="fw-bold fade-in">Bersama, Kami Berkarya</h2>
            <p>Mengembangkan solusi inovatif untuk butik online.</p>
        </div>
    </div>

    <div class="row justify-content-center">
        <!-- Anggota Tim -->
        @php
        $members = [
                ["nama" => "Helen Imeldasari", "nim" => "2257401016", "kelas" => "MI22A", "github" => "https://github.com/username", "gambar" => "/images/helen.jpg", "kontribusi" => "Pengembangan Website"],
                ["nama" => "Titi Safitri", "nim" => "2257401022", "kelas" => "MI22A", "github" => "https://github.com/username", "gambar" => "/images/titi.jpg", "kontribusi" => "Pengembangan Website"]
                   ];
        @endphp
        @foreach ($members as $member)
        <div class="col-md-6 mb-4">
            <div class="card team-card text-center">
                <div class="card-body">
                    <div class="profile-container">
                    <img src="{{ 'images/' . $member['gambar'] }}" class="profile-img" alt="{{ $member['nama'] }}">
                    </div>
                    <h5 class="fw-bold mt-3">{{ $member['nama'] }}</h5>
                    <p class="text-muted">{{ $member['kelas'] }} | {{ $member['nim'] }}</p>
                    <p class="kontribusi">✨ {{ $member['kontribusi'] }} ✨</p>
                    <a href="{{ $member['github'] }}" target="_blank" class="btn btn-dark btn-sm rounded-pill">🔗 GitHub</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Styling -->
<style>
    /* Hero Banner Premium */
    .hero-banner {
        position: relative;
        width: 100%;
        height: 250px;
        background: url("{{ asset('images/background.jpg') }}") no-repeat center center/cover;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-align: center;
        overflow: hidden;
        animation: fadeIn 1.5s ease-in-out;
    }
    .overlay {
        position: absolute;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
    }
    .hero-text {
        position: relative;
        z-index: 2;
    }
    .fade-in {
        animation: fadeIn 1.5s ease-in-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(15px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Kartu Anggota Tim */
    .team-card {
        background: #ffffff;
        color: #333;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s;
        border-radius: 12px;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        padding: 20px;
        max-width: 500px;
        margin: auto;
    }
    .team-card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 8px 18px rgba(0, 0, 0, 0.2);
    }

    /* Foto Profil (Hover Berputar) */
    .profile-container {
        width: 120px;
        height: 120px;
        margin: auto;
        border-radius: 50%;
        overflow: hidden;
        transition: transform 0.6s ease-in-out;
    }
    .profile-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
        border: 3px solid #fff;
        transition: transform 0.6s ease-in-out;
    }
    .profile-container:hover .profile-img {
        transform: rotate(360deg);
    }

    /* Efek Animasi pada Kontribusi (Merah dan Warna Lain) */
    .kontribusi {
        font-weight: bold;
        color: #333;
        animation: textGlow 2s infinite alternate;
    }
    @keyframes textGlow {
        from { color: #000; text-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); }
        to { color: #ff5733; text-shadow: 0px 0px 15px rgba(255, 87, 51, 0.5); }
    }
</style>
@endsection