@extends('layouts.guest.app')

@section('title', 'Detail Warga')

@section('content')
<div class="container py-5">
    <div class="container" style="
        max-width: 700px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        padding: 20px 30px;
    ">
        <h2 class="text-center mb-4">Detail Warga</h2>

        <table class="table table-borderless" style="width: 100%;">
            <tr>
                <th style="width: 35%; color:#555;">Nama Lengkap</th>
                <td>{{ $warga->nama_lengkap }}</td>
            </tr>
            <tr>
                <th>NIK</th>
                <td>{{ $warga->nik }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $warga->alamat }}</td>
            </tr>
            <tr>
                <th>No Telepon</th>
                <td>{{ $warga->no_telepon ?? '-' }}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $warga->jenis_kelamin }}</td>
            </tr>
            <tr>
                <th>Dibuat Pada</th>
                <td>{{ $warga->created_at->format('d M Y H:i') }}</td>
            </tr>
            <tr>
                <th>Diperbarui Pada</th>
                <td>{{ $warga->updated_at->format('d M Y H:i') }}</td>
            </tr>
        </table>

        <div class="mt-4 d-flex justify-content-between">
            <a href="{{ route('warga.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i> Kembali
            </a>
            <a href="{{ route('warga.edit', $warga->id) }}" class="btn btn-warning text-dark">
                <i class="fas fa-edit me-1"></i> Edit
            </a>
        </div>
    </div>
</div>
@endsection
