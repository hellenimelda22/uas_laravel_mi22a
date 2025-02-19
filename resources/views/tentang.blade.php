@extends('layouts.main')

@section('title', 'Tentang Kami')

@section('content')
<div class="container">
    <h2 class="text-center mt-4">Tentang Kami</h2>
    <p class="text-center">Kami adalah tim yang mengembangkan website butik "Tukuklamby".</p>

    <div class="row justify-content-center mt-4">
        <!-- Anggota 1 -->
        <div class="col-md-5 text-center">
        <img src="{{ asset('images/helen.jpg') }}" class="rounded-circle mb-3" alt="Helen Imeldasari" width="150" height="150">
            <table class="table table-bordered">
                <tr>
                    <th>NIM</th>
                    <td>2257401016</td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>Helen Imeldasari</td>
                </tr>
                <tr>
                    <th>Kelas</th>
                    <td>MI22A</td>
                </tr>
                <tr>
                    <th>Alamat GitHub</th>
                    <td><a href="https://github.com/username" target="_blank">GitHub</a></td>
                </tr>
                <tr>
                    <th>Kontribusi</th>
                    <td>Pengembangan Website</td>
                </tr>
            </table>
        </div>

        <!-- Anggota 2 -->
        <div class="col-md-5 text-center">
            <img src="{{ asset('images/titi.jpg') }}" class="rounded-circle mb-3" alt="Titi Safitri" width="150" height="150">
            <table class="table table-bordered">
                <tr>
                    <th>NIM</th>
                    <td>2257401022</td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>Titi Safitri</td>
                </tr>
                <tr>
                    <th>Kelas</th>
                    <td>MI22A</td>
                </tr>
                <tr>
                    <th>Alamat GitHub</th>
                    <td><a href="https://github.com/username" target="_blank">GitHub</a></td>
                </tr>
                <tr>
                    <th>Kontribusi</th>
                    <td>Pengembangan Website</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
