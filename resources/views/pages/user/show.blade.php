@extends('layouts.guest.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm p-4">
        <h2 class="mb-4 text-center">Detail User</h2>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td>{{ $user->id }}</td>
            </tr>
            <tr>
                <th>Nama</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th>Username</th>
                <td>{{ $user->username }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th>Dibuat Pada</th>
                <td>{{ $user->created_at->format('d M Y H:i') }}</td>
            </tr>
        </table>

        <div class="text-center mt-3">
            <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">Edit</a>
        </div>
    </div>
</div>
@endsection
