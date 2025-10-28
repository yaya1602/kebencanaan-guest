@extends('layouts.guest.app')
@section('content')
    {{--APP--}}
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-warning text-dark text-center">
                        <h2 class="h4 mb-0"><i class="fas fa-edit"></i> Edit Laporan Kejadian</h2>
                    </div>
                    <div class="card-body p-4 p-md-5">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('kejadian-bencana.update-post', $kejadianBencana->id) }}" method="POST" enctype="multipart/form-data">
                         @csrf <div class="mb-3">
                                <label for="nama_bencana" class="form-label fw-bold">Nama Bencana</label>
                                <input type="text" class="form-control @error('nama_bencana') is-invalid @enderror" id="nama_bencana" name="nama_bencana" value="{{ old('nama_bencana', $kejadianBencana->nama_bencana) }}" required>
                                @error('nama_bencana')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="lokasi" class="form-label fw-bold">Lokasi Kejadian</label>
                                <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi" value="{{ old('lokasi', $kejadianBencana->lokasi) }}" required>
                                @error('lokasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tanggal" class="form-label fw-bold">Tanggal Kejadian</label>
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal', \Carbon\Carbon::parse($kejadianBencana->tanggal)->format('Y-m-d')) }}" required>
                                @error('tanggal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi" class="form-label fw-bold">Deskripsi</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="5" required>{{ old('deskripsi', $kejadianBencana->deskripsi) }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="gambar" class="form-label fw-bold">Ganti Gambar (Opsional)</label>

                                @if ($kejadianBencana->gambar)
                                    <div class="mb-2">
                                        <img src="{{ Storage::url($kejadianBencana->gambar) }}" alt="Gambar saat ini" class="img-thumbnail" width="200">
                                        <p class="text-muted small mt-1">Gambar saat ini</p>
                                    </div>
                                @endif

                                <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar">
                                <div class="form-text">Kosongkan jika tidak ingin mengganti gambar.</div>
                                @error('gambar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('kejadian-bencana.index') }}" class="btn btn-secondary me-md-2">
                                    <i class="fas fa-times"></i> Batal
                                </a>
                                <button type="submit" class="btn btn-warning text-dark">
                                    <i class="fas fa-save"></i> Update Laporan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection