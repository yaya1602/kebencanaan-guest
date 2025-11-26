@extends('layouts.guest.app')

@section('content')
<div class="container">

    <h2 class="mb-4">Daftar Posko Bencana</h2>

    <a href="{{ route('posko.create') }}" class="btn btn-primary mb-4">+ Tambah Posko</a>

    <!-- letak disini untuk kode filternya  -->
     <form method="GET" action="{{ route('posko.index') }}" class="mb-3">
    <div class="row">

        <div class="col-md-3">
            <label class="form-label fw-bold">Filter Penanggung Jawab</label>
            <select name="penanggung_jawab" class="form-select" onchange="this.form.submit()">
                <option value="">Semua Penanggung</option>

                @foreach($listPJ as $pj)
                    <option value="{{ $pj->penanggung_jawab }}"
                        {{ request('penanggung_jawab') == $pj->penanggung_jawab ? 'selected' : '' }}>
                        {{ $pj->penanggung_jawab }}
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
            
             @if(request('search')) 							
            <a href="{{ request()->fullUrlWithQuery(['search'=> null]) }}" class="btn btn-outline-secondary ml-3" id="clear-search"> Clear</a> 					
            @endif
            </div>
           


</div>
</form>






    <div class="row">
        @forelse ($PoskoBencana as $p)
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">

                <div class="card-body">
                    <h5 class="card-title">{{ $p->nama_posko }}</h5>

                    <p class="card-text mb-1">
                        <strong>Alamat:</strong><br>
                        {{ $p->alamat }}
                    </p>

                    <p class="card-text mb-1">
                        <strong>Kontak:</strong> {{ $p->kontak }}
                    </p>

                    <p class="card-text">
                        <strong>Penanggung Jawab:</strong><br>
                        {{ $p->penanggung_jawab }}
                    </p>

                    <div class="d-flex justify-content-between">

                        <a href="{{ route('posko.show', $p->posko_id) }}"
                           class="btn btn-info btn-sm">
                            Lihat
                        </a>

                        <a href="{{ route('posko.edit', $p->posko_id) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('posko.destroy', $p->posko_id) }}"
                              method="POST"
                              onsubmit="return confirm('Hapus posko?')"
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>


                    </div>

                </div>


            </div>


        </div>
        @empty
            <p class="text-muted">Belum ada data posko.</p>
        @endforelse
        <div class="mt-3">
            
        {{$PoskoBencana->links('pagination::simple-bootstrap-5')}}
    </div>
    </div>

</div>
@endsection
