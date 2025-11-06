@extends('layouts.guest.app')

@section('title', 'Edit Warga')

@section('content')
<div class="container">
    <h2 class="mb-3">Edit Data Warga</h2>

    <form action="{{ route('warga.update', $warga->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" value="{{ $warga->nama_lengkap }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>NIK</label>
            <input type="text" name="nik" value="{{ $warga->nik }}" class="form-control" maxlength="16" required>
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" rows="3" required>{{ $warga->alamat }}</textarea>
        </div>

        <div class="mb-3">
            <label>No Telepon</label>
            <input type="text" name="no_telepon" value="{{ $warga->no_telepon }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-select" required>
                <option value="Laki-laki" {{ $warga->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $warga->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('warga.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
