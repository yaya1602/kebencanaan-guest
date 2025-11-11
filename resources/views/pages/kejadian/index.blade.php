@extends('layouts.guest.app')

@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="mb-3">Daftar Kejadian Bencana</h1>
            <p>Berikut data kejadian bencana yang telah tercatat.</p>
        </div>

        <a href="{{ route('kejadian.create') }}" class="btn btn-primary mb-4">
            <i class="fa fa-plus me-2"></i> Tambah Kejadian
        </a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row g-4">
            @forelse($kejadianBencana as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm kejadian-card">
                        @if($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" alt="Gambar Bencana">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nama_bencana }}</h5>
                            <p class="card-text">{{ Str::limit($item->deskripsi, 80) }}</p>
                            <p><strong>Lokasi:</strong> {{ $item->lokasi }}</p>
                            <p><strong>Tanggal:</strong> {{ $item->tanggal }}</p>

                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <!-- Tombol Lihat -->

                                <a href="{{ route('kejadian.show', $item->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-eye me-1"></i> Lihat
                                </a>

                                <!-- Tombol Edit -->

                                <a href="{{ route('kejadian.edit', $item->id) }}" class="btn btn-warning btn-sm text-white">
                                    <i class="fa fa-edit me-1"></i> Edit
                                </a>

                                <!-- Tombol Hapus -->
                                 
                                <form action="{{ route('kejadian.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash me-1"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">Belum ada data kejadian bencana.</p>
            @endforelse
        </div>

        <div class="mt-4">
            {{ $kejadianBencana->links() }}
        </div>
    </div>
</div>
@endsection
