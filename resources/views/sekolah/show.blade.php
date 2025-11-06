@extends('layout-sekolah.app')

@section('content')
<div class="container py-5">
    <h2>{{ $kejadianBencana->nama_bencana }}</h2>
    <p><strong>Tanggal:</strong> {{ $kejadianBencana->tanggal }}</p>
    <p><strong>Lokasi:</strong> {{ $kejadianBencana->lokasi }}</p>
    <p>{{ $kejadianBencana->deskripsi }}</p>
    @if ($kejadianBencana->gambar)
        <img src="{{ asset('storage/' . $kejadianBencana->gambar) }}" alt="" width="300">
    @endif
    <br><br>
    <a href="{{ route('kejadian-bencana.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
