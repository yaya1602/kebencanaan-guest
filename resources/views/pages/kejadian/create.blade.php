@extends('layouts.guest.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Tambah Kejadian Bencana</h2>

    <form action="{{ route('kejadian.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Bencana</label>
            <input type="text" name="nama_bencana" class="form-control" value="{{ old('nama_bencana') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Lokasi</label>
            <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4" required>{{ old('deskripsi') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Gambar (Opsional)</label>
            <input type="file" name="gambar" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('kejadian.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
