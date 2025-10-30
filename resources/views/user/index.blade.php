@extends('layout-sekolah.app')
@section('content')


            <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4">About Us</h1>
                        <nav aria-label="breadcrumb animated fadeIn">
                        <ol class="breadcrumb text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-body active" aria-current="page">About</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 animated fadeIn">
                    <img class="img-fluid" src="{{ asset('guest/img/header.jpg')}}" alt="">
                </div>
            </div>
        </div>
        <!-- Header End -->

    <div class="top-actions">
        <a href="{{ route('user.create') }}">➕ Tambah User</a>
    </div>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
        @foreach($users as $u)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $u->name }}</td>
            <td>{{ $u->email }}</td>
            <td>
                <a class="edit-link" href="{{ route('user.edit', $u->id) }}">Edit</a> |
                <form action="{{ route('user.destroy', $u->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin ingin menghapus user ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection