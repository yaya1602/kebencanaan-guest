@extends('layouts.guest.app')


@section('content')
<div class="container py-5">
    <h2 class="mb-4">Edit Kejadian Bencana</h2>

    <form action="{{ route('kejadian.update', $kejadian_bencana->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Bencana</label>
            <input type="text" name="nama_bencana" class="form-control" value="{{ old('nama_bencana', $kejadian_bencana->nama_bencana) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', $kejadian_bencana->tanggal) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Lokasi</label>
            <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi', $kejadian_bencana->lokasi) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4" required>{{ old('deskripsi', $kejadian_bencana->deskripsi) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Gambar</label><br>
            @if($kejadian_bencana->gambar)
                <img src="{{ asset('storage/'.$kejadian_bencana->gambar) }}" alt="Gambar" width="200" class="mb-3">
            @endif
            <input type="file" name="gambar" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Perbarui</button>
        <a href="{{ route('kejadian.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
