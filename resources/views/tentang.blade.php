@extends('layouts.main')

@section('title', 'Tentang Kami')

@section('content')
<div class="container">
    <h2 class="text-center mt-4">Tentang Kami</h2>
    <p class="text-center">Kami adalah tim yang mengembangkan website butik "Tukuklamby".</p>
    
    <div class="row justify-content-center mt-4">
        <div class="col-md-6">
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
                    <td>Pengembangan Backend dan Frontend</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
