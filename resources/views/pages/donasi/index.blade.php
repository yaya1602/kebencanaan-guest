@extends('layouts.guest.app')

@section('content')
<div class="container">
    <h2>Daftar Donasi Bencana</h2>

    <a href="{{ route('donasi.create') }}" class="btn btn-primary mb-3">+ Tambah Donasi</a>

    <form method="GET" action="{{ route('donasi.index') }}" class="mb-3">
        <div class="row">
            <div class="col-md-3">
                <select name="jenis_donasi" class="form-select" onchange="this.form.submit()">
                    <option value="">Semua Jenis Donasi</option>

                    @foreach ($listJenisDonasi as $jenis)
                        <option value="{{ $jenis }}" {{ request('jenis_donasi') == $jenis ? 'selected' : '' }}>
                            {{ $jenis }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Search">
                    <button type="submit" class="input-group-text">
                         <!-- Tombol Cari -->
            <button class="btn btn-success" type="submit">
            Cari
            </button>
                    </button>

                    @if(request('search')) 							
                        <a href="{{ request()->fullUrlWithQuery(['search'=> null]) }}" class="btn btn-outline-secondary ml-3">
                            Clear
                        </a> 					
                    @endif
                   
                </div>
            </div>
        </div>
    </form>

    {{-- ========== CARD VERSION ========== --}}
    <div class="row">
        @foreach ($dataDonasi as $d)
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body">

                        <h5 class="card-title">{{ $d->donatur_nama }}</h5>

                        <p class="mb-1"><strong>Jenis Donasi:</strong> {{ $d->jenis_donasi }}</p>
                        <p class="mb-1"><strong>Nilai:</strong> Rp {{ number_format($d->nilai) }}</p>
                        <p class="mb-3"><strong>Posko:</strong> {{ $d->posko->nama_posko }}</p>

                        <div class="d-flex gap-2">

                            {{-- DETAIL / LIHAT --}}
                            <a href="{{ route('donasi.show', $d->donasi_id) }}" class="btn btn-info btn-sm">
                                <i class="bi bi-eye"></i> Lihat
                            </a>

                            {{-- EDIT --}}
                            <a href="{{ route('donasi.edit', $d->donasi_id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>

                            {{-- HAPUS --}}
                            <form action="{{ route('donasi.destroy', $d->donasi_id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Hapus donasi?')" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-3">
        {{ $dataDonasi->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
