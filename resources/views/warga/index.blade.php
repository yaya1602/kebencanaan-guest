@extends('Layouts.guest.app')
@section('content')
    {{--APP--}}
    <div class="hero-section">
        <div class="text-center px-3">
            {{-- GANTI JUDUL --}}
            <h1 class="display-4 fw-bold">Manajemen Data Warga</h1>
            <p class="lead">Kelola data warga yang terdaftar di desa.</p>
            {{-- GANTI ROUTE & TEKS --}}
            <a href="{{ route('warga.create') }}" class="btn btn-primary btn-lg mt-3">
                <i class="fas fa-plus-circle"></i> Tambah Data Warga
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
            {{-- GANTI VARIABEL LOOP --}}
            @forelse ($wargas as $warga)
                <div class="col-md-6 col-lg-4">
                    <div class="bencana-card">


                        <div class="bencana-card-body">
                            {{-- GANTI FIELD --}}
                            <h5 class="bencana-card-title">{{ $warga->nama_lengkap }}</h5>

                            {{-- GANTI INFO SESUAI DATA WARGA --}}
                            <div class="bencana-card-info">
                                <p class="mb-1"><strong><i class="fas fa-id-card"></i> NIK:</strong> {{ $warga->nik }}</p>
                                <p class="mb-1"><strong><i class="fas fa-phone-alt"></i> No. Telp:</strong> {{ $warga->no_telepon }}</p>
                                <p class="mb-0"><strong><i class="fas fa-home"></i> Alamat:</strong> {{ $warga->alamat }}</p>
                            </div>

                            {{-- Hapus deskripsi, karena sudah diganti alamat di atas --}}
                            {{-- <p class="bencana-card-text">{{ $warga->deskripsi }}</p> --}}

                            <div class="bencana-card-actions">
                                {{-- GANTI ROUTE & VARIABEL --}}
                                <a href="{{ route('warga.show', $warga->id) }}" class="btn btn-info btn-sm text-white">
                                    <i class="fas fa-eye"></i> Detail
                                </a>
                                <a href="{{ route('warga.edit', $warga->id) }}" class="btn btn-warning btn-sm text-dark">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('warga.destroy', $warga->id) }}" method="POST" class="d-inline">
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
                        {{-- GANTI TEKS --}}
                        <h4 class="alert-heading">Data Warga Kosong</h4>
                        <p>Belum ada data warga yang ditambahkan.</p>
                        <hr>
                        {{-- GANTI ROUTE & TEKS --}}
                        <a href="{{ route('warga.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i> Tambah Data Warga Pertama
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{-- GANTI VARIABEL PAGINASI --}}
            {{ $wargas->links() }}
        </div>
    </div>
@endsection
