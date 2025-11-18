@extends('layouts.guest.app')

@section('content')
<div class="container">
    <h2>Detail Donasi</h2>

    <div class="mb-3">
        <strong>Nama Donatur:</strong> {{ $donasi->donatur_nama }}
    </div>

    <div class="mb-3">
        <strong>Jenis Donasi:</strong> {{ $donasi->jenis_donasi }}
    </div>

    <div class="mb-3">
        <strong>Nilai:</strong> {{ number_format($donasi->nilai) }}
    </div>

    <div class="mb-3">
        <strong>Posko:</strong> {{ $donasi->posko->nama_posko }}
    </div>

    <a href="{{ route('donasi.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
