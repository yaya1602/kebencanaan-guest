@extends('layouts.guest.app')

@section('content')
<div class="container">
    <h2>Tambah Donasi</h2>

    <form action="{{ route('donasi.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Pilih Posko</label>
            <select name="posko_id" class="form-control" required>
                <option value="">-- pilih posko --</option>
                @foreach($posko as $p)
                    <option value="{{ $p->posko_id }}">{{ $p->nama_posko }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Nama Donatur</label>
            <input type="text" name="donatur_nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jenis Donasi</label>
            <input type="text" name="jenis_donasi" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Nilai Donasi</label>
            <input type="number" name="nilai" class="form-control" required>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('donasi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
