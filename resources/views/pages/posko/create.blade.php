@extends('layouts.guest.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Tambah Posko Bencana</h4>
                </div>

                <div class="card-body">

                    <form action="{{ route('posko.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Nama Posko</label>
                            <input type="text" name="nama_posko" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat" class="form-control" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kontak</label>
                            <input type="text" name="kontak" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Penanggung Jawab</label>
                            <input type="text" name="penanggung_jawab" class="form-control" required>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('posko.index') }}" class="btn btn-secondary">Kembali</a>
                            <button class="btn btn-success">Simpan</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection
