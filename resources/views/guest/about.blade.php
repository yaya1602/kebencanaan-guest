@extends('Layouts.guest.app')

@section('content')
<div class="container py-5">
    <div class="text-center mb-4">
        <h1 class="text-2xl font-bold mb-2">
            <i class="fa-solid fa-circle-info text-primary"></i> Tentang Aplikasi
        </h1>
        <p class="text-muted">Sistem Informasi Kebencanaan Desa - membantu masyarakat dan petugas dalam pengelolaan data bencana secara cepat dan akurat.</p>
    </div>

    <div class="row align-items-center">
        <div class="col-md-6">
            <img src="{{ asset('assets-guest/img/pegunungan.jpeg') }}" alt="Tentang Aplikasi" class="img-fluid rounded shadow">
        </div>
        <div class="col-md-6">
            <h3><i class="fa-solid fa-bullseye text-success"></i> Tujuan</h3>
            <p>Memberikan kemudahan bagi warga dan petugas desa dalam melaporkan, memantau, dan menindaklanjuti kejadian bencana secara digital.</p>

            <h3 class="mt-4"><i class="fa-solid fa-route text-info"></i> Alur Penggunaan</h3>
            <ul>
                <li><i class="fa-solid fa-user-plus text-warning"></i> Warga mendaftar dan login ke aplikasi.</li>
                <li><i class="fa-solid fa-file-circle-plus text-primary"></i> Warga mengisi laporan bencana melalui form yang disediakan.</li>
                <li><i class="fa-solid fa-bell text-danger"></i> Petugas menerima notifikasi laporan dan melakukan verifikasi.</li>
                <li><i class="fa-solid fa-chart-line text-success"></i> Data digunakan untuk rekapitulasi dan analisis.</li>
            </ul>
        </div>
    </div>

    <footer class="mt-5 text-center">
        <p class="text-muted">
            <i class="fa-solid fa-leaf text-success"></i> Dikembangkan oleh Tim Desa Cerdas • 2025
        </p>
    </footer>
</div>
@endsection
