@extends('layouts.guest.app')
@section('content')
    {{--APP--}}
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white text-center">
                        <h2 class="h4 mb-0"><i class="fas fa-bullhorn"></i> Lapor Kejadian Bencana Baru</h2>
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

                        <form action="{{ route('kejadian-bencana.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf <div class="mb-3">
                                <label for="nama_bencana" class="form-label fw-bold">Nama Bencana</label>
                                <input type="text" class="form-control @error('nama_bencana') is-invalid @enderror" id="nama_bencana" name="nama_bencana" value="{{ old('nama_bencana') }}" placeholder="Contoh: Banjir Bandang" required>
                                @error('nama_bencana')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="lokasi" class="form-label fw-bold">Lokasi Kejadian</label>
                                <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi" value="{{ old('lokasi') }}" placeholder="Contoh: Desa Sukamaju, Kec. Makmur" required>
                                @error('lokasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tanggal" class="form-label fw-bold">Tanggal Kejadian</label>
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal') }}" required>
                                @error('tanggal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi" class="form-label fw-bold">Deskripsi</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="5" placeholder="Jelaskan detail kejadian..." required>{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-4">
                                <label for="gambar" class="form-label fw-bold">Upload Gambar (Opsional)</label>
                                <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar">
                                @error('gambar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('kejadian-bencana.index') }}" class="btn btn-secondary me-md-2">
                                    <i class="fas fa-times"></i> Batal
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Simpan Laporan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
    