@extends('layouts.guest.app')

@section('content')
<div class="container">
    <h2>Daftar Donasi Bencana</h2>

    <a href="{{ route('donasi.create') }}" class="btn btn-primary mb-3">+ Tambah Donasi</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Donatur</th>
                <th>Jenis Donasi</th>
                <th>Nilai</th>
                <th>Posko</th>
                <th width="20%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataDonasi as $d)
            <tr>
                <td>{{ $d->donatur_nama }}</td>
                <td>{{ $d->jenis_donasi }}</td>
                <td>{{ number_format($d->nilai) }}</td>
                <td>{{ $d->posko->nama_posko }}</td>
                <td>
                    <a href="{{ route('donasi.show', $d->donasi_id) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('donasi.edit', $d->donasi_id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('donasi.destroy', $d->donasi_id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Hapus donasi?')" class="btn btn-danger btn-sm">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-3">
        {{ $dataDonasi->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
