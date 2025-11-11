@extends('layouts.guest.app')


@section('content')
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h1 class="mb-3">Kejadian Bencana</h1>
                <p>Berikut adalah informasi terkini mengenai kejadian bencana di wilayah desa.</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="team-item rounded overflow-hidden">
                        <div class="position-relative">
                             <a href="{{ route('kejadian_bencana.index') }}">
                            <img class="img-fluid" src="{{ asset('assets-guest/img/banjirr.jpeg') }}" alt="Banjir">
                        </div>
                        <div class="text-center p-4 mt-3">
                            <a href="{{ route('kejadian_bencana.index') }}" class="text-decoration-none text-dark">
                            <h5 class="fw-bold mb-0">Banjir di Desa A</h5>
                            <p class="text-muted mb-0">Kerusakan ringan dan sedang di beberapa rumah warga.</p>
                        </div>
                    </div>
                </div>
                <!-- Tambah card lainnya di sini -->
            </div>
        </div>
    </div>
@endsection
