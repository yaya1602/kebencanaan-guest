@extends('layouts.guest.app')

@section('content')
<div class="container">

    <h2 class="mb-4">Daftar Posko Bencana</h2>

    <a href="{{ route('posko.create') }}" class="btn btn-primary mb-4">+ Tambah Posko</a>


    <div class="row">
        @forelse ($dataPosko as $p)
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
        {{ $dataPosko->links('pagination::bootstrap-5') }}
    </div>
    </div>

</div>
@endsection
