@extends('layouts.guest.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-3">{{ $kejadian->nama_bencana }}</h2>
    <p><strong>Tanggal:</strong> {{ $kejadian->tanggal }}</p>
    <p><strong>Lokasi:</strong> {{ $kejadian->lokasi }}</p>
    <p>{{ $kejadian->deskripsi }}</p>

    @if($kejadian->gambar)
        <img src="{{ asset('storage/'.$kejadian->gambar) }}" alt="Gambar" width="400" class="mt-3">
    @endif

    <div class="mt-4">
        <a href="{{ route('kejadian.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
