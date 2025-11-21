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

    <form action="{{ route('kejadian.index') }}" method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <label class="form-label fw-bold">Filter Nama Bencana</label>
                    <select name="nama_bencana" class="form-control" onchange="this.form.submit()">
                        <option value="">Semua Jenis</option>

                @foreach($jenisBencana as $row)
                    <option value="{{ $row->nama_bencana }}"
                        {{ request('nama_bencana') == $row->nama_bencana ? 'selected' : '' }}>
                        {{ $row->nama_bencana }}
                    </option>
                @endforeach
                     </select>
            </div>


              {{-- SEARCH --}}
             <div class="col-md-3">
                 <div class="input-group mt-4">
                     <input type="text" name="search" class="form-control"
                        value="{{ request('search') }}" placeholder="Search...">

                    <!-- Tombol Cari -->
            <button class="btn btn-success" type="submit">
            Cari
            </button>
            </div>

        </div>

        <div class="col-md-2 d-flex align-items-end">
            <a href="{{ route('kejadian.index') }}" class="btn btn-secondary">Reset</a>
        </div>
    </div>
    </form>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row g-4">
            @forelse($dataKejadian as $item)
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
            <div class="mt-3">
        {{ $dataKejadian->links('pagination::bootstrap-5') }}
    </div>
        </div>


    </div>
</div>
@endsection
