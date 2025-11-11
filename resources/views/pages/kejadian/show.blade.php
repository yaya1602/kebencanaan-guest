@extends('layouts.guest.app')


@section('content')
<div class="container py-5">
    <h2 class="mb-3">{{ $kejadian_bencana->nama_bencana }}</h2>
    <p><strong>Tanggal:</strong> {{ $kejadian_bencana->tanggal }}</p>
    <p><strong>Lokasi:</strong> {{ $kejadian_bencana->lokasi }}</p>
    <p>{{ $kejadian_bencana->deskripsi }}</p>

    @if($kejadian_bencana->gambar)
        <img src="{{ asset('storage/'.$kejadian_bencana->gambar) }}" alt="Gambar" width="400" class="mt-3">
    @endif

    <div class="mt-4">
        <a href="{{ route('kejadian.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
