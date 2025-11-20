@extends('layouts.guest.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-10">

            {{-- Card Detail Posko --}}
            <div class="card shadow-lg border-0 mb-4">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0">
                        <i class="bi bi-building"></i> Detail Posko
                    </h4>
                </div>

                <div class="card-body">

                    <div class="mb-3">
                        <strong>Nama Posko:</strong><br>
                        {{ $posko->nama_posko }}
                    </div>

                    <div class="mb-3">
                        <strong>Alamat:</strong><br>
                        {{ $posko->alamat }}
                    </div>

                    <div class="mb-3">
                        <strong>Kontak:</strong><br>
                        {{ $posko->kontak }}
                    </div>

                    <div class="mb-3">
                        <strong>Penanggung Jawab:</strong><br>
                        {{ $posko->penanggung_jawab }}
                    </div>

                </div>
            </div>

            {{-- Card Donasi --}}
            <div class="card shadow border-0">
                <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><i class="bi bi-gift"></i> Daftar Donasi di Posko Ini</h4>

                    <a href="{{ route('donasi.create') }}" class="btn btn-light btn-sm">
                        <i class="bi bi-plus-circle"></i> Tambah Donasi
                    </a>
                </div>

                <div class="card-body">

                    <table class="table table-bordered table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Donatur</th>
                                <th>Jenis</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posko->donasi as $d)
                            <tr>
                                <td>{{ $d->donatur_nama }}</td>
                                <td>{{ $d->jenis_donasi }}</td>
                                <td>{{ number_format($d->nilai) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
    
                </div>
            </div>

            <div class="text-end mt-3">
                <a href="{{ route('posko.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left-circle me-1"></i> Kembali
                </a>
            </div>

        </div>
    </div>

</div>
@endsection
