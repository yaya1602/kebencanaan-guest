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
        <input type="text" name="search" class="form-control" id="exampleInputIconRight" value="{{request('search')}}" placeholder="Search" aria-label="Search">
        <button type="submit" class="input-group-text" id="basic-addon2">
        <svg class="icon icon-xxs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
        </button>

        @if(request('search')) 							
    <a href="{{ request()->fullUrlWithQuery(['search'=> null]) }}" class="btn btn-outline-secondary ml-3" id="clear-search">
         Clear</a> 					
         @endif
    </div>
</div>
    </div>
</form>


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
