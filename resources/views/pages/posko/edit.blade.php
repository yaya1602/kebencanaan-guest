@extends('layouts.guest.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-lg border-0">
                <div class="card-header bg-warning text-dark">
                    <h4 class="mb-0">Edit Posko</h4>
                </div>

                <div class="card-body">

                    <form action="{{ route('posko.update', $posko->posko_id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Nama Posko</label>
                            <input type="text" name="nama_posko" class="form-control" 
                                   value="{{ $posko->nama_posko }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat" class="form-control" rows="3" required>{{ $posko->alamat }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kontak</label>
                            <input type="text" name="kontak" class="form-control" 
                                   value="{{ $posko->kontak }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Penanggung Jawab</label>
                            <input type="text" name="penanggung_jawab" class="form-control" 
                                   value="{{ $posko->penanggung_jawab }}" required>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            
                            <a href="{{ route('posko.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left-circle me-1"></i> Kembali
                            </a>

                            <button class="btn btn-warning">
                                <i class="bi bi-pencil-square me-1"></i> Update
                            </button>

                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection
