@extends('layouts.guest.app')
@section('content')
    {{--APP--}}
    <div class="hero-section">
        <div class="text-center px-3">
            <h1 class="display-4 fw-bold">Informasi Kejadian Bencana</h1>
            <p class="lead">Pantau dan laporkan kejadian bencana di sekitar Anda.</p>
            <a href="{{ route('kejadian-bencana.create') }}" class="btn btn-primary btn-lg mt-3">
                <i class="fas fa-plus-circle"></i> Tambah Laporan Baru
            </a>
        </div>
    </div>

    <div class="container mt-5">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            @forelse ($kejadianBencanas as $bencana)
                <div class="col-md-6 col-lg-4">
                    <div class="bencana-card">
                        @if ($bencana->gambar)
                            <img src="{{ Storage::url($bencana->gambar) }}" alt="{{ $bencana->gambar }}">
                        @else
                            <img src="https://via.placeholder.com/400x220.png?text=Tidak+Ada+Gambar" alt="Tidak Ada Gambar">
                        @endif
                        
                        <div class="bencana-card-body">
                            <h5 class="bencana-card-title">{{ $bencana->nama_bencana }}</h5>
                            <div class="bencana-card-info">
                                <p class="mb-1"><strong><i class="fas fa-map-marker-alt"></i> Lokasi:</strong> {{ $bencana->lokasi }}</p>
                                <p class="mb-0"><strong><i class="fas fa-calendar-alt"></i> Tanggal:</strong> {{ \Carbon\Carbon::parse($bencana->tanggal)->format('d F Y') }}</p>
                            </div>
                            <p class="bencana-card-text">{{ $bencana->deskripsi }}</p>
                            
                            <div class="bencana-card-actions">
                                <a href="{{ route('kejadian-bencana.show', $bencana->id) }}" class="btn btn-info btn-sm text-white">
                                    <i class="fas fa-eye"></i> Detail
                                </a>
                                <a href="{{ route('kejadian-bencana.edit', $bencana->id) }}" class="btn btn-warning btn-sm text-dark">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('kejadian-bencana.destroy', $bencana->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center" role="alert">
                        <h4 class="alert-heading">Data Kosong</h4>
                        <p>Belum ada data kejadian bencana yang dilaporkan.</p>
                        <hr>
                        <a href="{{ route('kejadian-bencana.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i> Jadi yang pertama melaporkan
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $kejadianBencanas->links() }}
        </div>
    </div>
@endsection