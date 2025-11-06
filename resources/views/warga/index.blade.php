@extends('layout-sekolah.app')

@section('title', 'Data Warga')

@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="mb-3">Daftar Warga</h1>
            <p>Berikut daftar warga yang terdaftar dalam sistem.</p>
        </div>

        <a href="{{ route('warga.create') }}" class="btn btn-success mb-4">+ Tambah Warga</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row g-4">
            @forelse($warga as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="card warga-card border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title mb-2">{{ $item->nama_lengkap }}</h5>
                            <p class="mb-1"><strong>NIK:</strong> {{ $item->nik }}</p>
                            <p class="mb-1"><strong>Alamat:</strong> {{ $item->alamat }}</p>
                            <p class="mb-1"><strong>No Telepon:</strong> {{ $item->no_telepon }}</p>
                            <p class="mb-2">
                                <strong>Jenis Kelamin:</strong> 
                                {{ $item->jenis_kelamin }}
                            </p>
                            <div class="d-flex justify-content-between mt-3">
                                <a href="{{ route('warga.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('warga.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">Belum ada data warga.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
