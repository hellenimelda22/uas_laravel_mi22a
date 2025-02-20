@extends('layouts.main')

@section('title', 'Login')

@section('content')
<div class="login-container">
    <div class="login-box">
        <h2 class="text-center fw-bold">Login Admin</h2>

        @if (session('error'))
            <div class="alert alert-danger text-center">{{ session('error') }}</div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control input-field" name="email" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control input-field" name="password" required>
            </div>

            <button type="submit" class="btn login-btn w-100">Masuk</button>

            <div class="text-center mt-3">
                <small>Belum punya akun? <a href="{{ route('register') }}" class="register-link">Daftar di sini</a></small>
            </div>
        </form>
    </div>
</div>

<!-- Styling -->
<style>
    /* Latar Login */
    .login-container {
        height: 65vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8f9fa;
        padding: 15px;
    }

    /* Box Login DIPERBESAR */
    .login-box {
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        padding: 25px;
        width: 100%;
        max-width: 380px; /* DIBESARKAN DARI 300px KE 380px */
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

    /* Tombol Login */
    .login-btn {
        padding: 10px;
        border-radius: 6px;
        font-weight: bold;
        background: #333;
        color: white;
        border: none;
        transition: 0.3s;
    }
    .login-btn:hover {
        background: #555;
        box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
    }

    /* Link Daftar */
    .register-link {
        color: #333;
        font-weight: bold;
        text-decoration: none;
        transition: 0.3s;
    }
    .register-link:hover {
        color: #ff5733;
        text-decoration: underline;
    }
</style>
@endsection
