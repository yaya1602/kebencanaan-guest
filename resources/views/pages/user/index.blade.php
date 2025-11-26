@extends('layouts.guest.app')


@section('title', 'Data User')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">Daftar User</h2>

    <a href="{{ route('user.create') }}" class="btn btn-success mb-4">
        <i class="fas fa-user-plus me-1"></i> + Tambah User
    </a>

    <form method="GET" action="{{ route('user.index') }}" class="mb-4">
    <div class="row">

        {{-- FILTER USERNAME --}}
        <div class="col-md-3">
            <select name="name" class="form-select" onchange="this.form.submit()">
                    <option value="">Semua Nama</option>
                        @foreach($listNames as $nm)
                     <option value="{{ $nm }}" {{ request('name') == $nm ? 'selected' : '' }}>
                        {{ $nm }}
                    </option>
                        @endforeach
            </select>

        </div>

        {{-- SEARCH --}}
        <div class="col-md-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control"
                       value="{{ request('search') }}"
                       placeholder="Cari Nama / Email / Username">

                <button type="submit" class="btn btn-success">
                    Cari
                </button>
            </div>
        </div>

        <div class="col-md-2">
            <a href="{{ route('user.index') }}" class="btn btn-secondary w-100">Reset</a>
        </div>

    </div>
</form>



    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row g-4">
        @forelse($dataUser as $index => $item)
            <div class="col-lg-4 col-md-6">
                <div class="card user-card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text mb-1"><strong>Email:</strong> {{ $item->email }}</p>

                        <div class="d-flex justify-content-between mt-3">
                            {{-- Tombol LIHAT --}}

                            <a href="{{ route('user.show', $item->id) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye me-1"></i> Lihat
                            </a>

                            {{-- Tombol EDIT --}}

                            <a href="{{ route('user.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit me-1"></i> Edit
                            </a>

                            {{-- Tombol HAPUS --}}

                            <form action="{{ route('user.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt me-1"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">Belum ada data user.</p>
        @endforelse
        <div class="mt-3">
        {{ $dataUser->links('pagination::simple-bootstrap-5') }}
    </div>
    </div>
</div>
@endsection
