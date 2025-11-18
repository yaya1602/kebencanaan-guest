@extends('layouts.guest.app')

@section('content')
<div class="container">
    <h2>Edit Donasi</h2>

    <form action="{{ route('donasi.update', $donasi->donasi_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Pilih Posko</label>
            <select name="posko_id" class="form-control" required>
                @foreach($posko as $p)
                    <option value="{{ $p->posko_id }}" {{ $donasi->posko_id == $p->posko_id ? 'selected' : '' }}>
                        {{ $p->nama_posko }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Nama Donatur</label>
            <input type="text" name="donatur_nama" class="form-control"
                   value="{{ $donasi->donatur_nama }}" required>
        </div>

        <div class="mb-3">
            <label>Jenis Donasi</label>
            <input type="text" name="jenis_donasi" class="form-control"
                   value="{{ $donasi->jenis_donasi }}" required>
        </div>

        <div class="mb-3">
            <label>Nilai Donasi</label>
            <input type="number" name="nilai" class="form-control"
                   value="{{ $donasi->nilai }}" required>
        </div>

        <button class="btn btn-warning">Update</button>
        <a href="{{ route('donasi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
