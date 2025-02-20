@extends('layouts.main')

@section('title', 'Daftar')

@section('content')
<div class="register-container">
    <div class="register-box">
        <h2 class="text-center fw-bold text-dark">Daftar Akun</h2>

        @if (session('error'))
            <div class="alert alert-danger text-center">{{ session('error') }}</div>
        @endif

        <form action="{{ route('register.process') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label text-dark">Nama Lengkap</label>
                <input type="text" class="form-control input-field" name="name" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label text-dark">Email</label>
                <input type="email" class="form-control input-field" name="email" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label text-dark">Password</label>
                <input type="password" class="form-control input-field" name="password" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label text-dark">Konfirmasi Password</label>
                <input type="password" class="form-control input-field" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn daftar-btn w-100">Daftar</button>

            <div class="text-center mt-3">
                <small class="text-dark">Sudah punya akun? <a href="{{ route('login') }}" class="login-link">Login di sini</a></small>
            </div>
        </form>
    </div>
</div>

<!-- Styling Monokrom Cerah -->
<style>
    /* Latar belakang */
    .register-container {
        height: 75vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8f9fa; /* Abu-abu sangat terang */
        padding: 15px;
    }

    /* Box Register */
    .register-box {
        background: #ffffff; /* Putih bersih */
        border-radius: 12px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        padding: 25px;
        width: 100%;
        max-width: 400px; /* Lebar proporsional */
    }

    /* Input Form */
    .input-field {
        border-radius: 6px;
        border: 1px solid #ddd;
        background: #f1f1f1; /* Abu-abu muda */
        color: black;
        transition: 0.3s ease-in-out;
    }
    .input-field:focus {
        border-color: #999;
        box-shadow: 0px 0px 6px rgba(0, 0, 0, 0.1);
    }

    /* Tombol Daftar (Hitam atau Abu Tua) */
    .daftar-btn {
        padding: 10px;
        border-radius: 6px;
        font-weight: bold;
        background: #333; /* Hitam */
        color: white;
        border: none;
        transition: 0.3s;
    }
    .daftar-btn:hover {
        background: #555; /* Abu tua saat hover */
        box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.2);
    }

    /* Login Link */
    .login-link {
        color: #333;
        font-weight: bold;
        text-decoration: none;
        transition: 0.3s;
    }
    .login-link:hover {
        color: #ff5733;
        text-decoration: underline;
    }
</style>
@endsection
