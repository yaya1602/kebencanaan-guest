<h2>Daftar User</h2>
<a href="{{ route('user.create') }}">Tambah User</a>
@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif
<table border="1" cellpadding="8">
    <tr>
        <th>No</th><th>Nama</th><th>Email</th><th>Aksi</th>
    </tr>
    @foreach($users as $u)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $u->name }}</td>
        <td>{{ $u->email }}</td>
        <td>
            <a href="{{ route('user.edit', $u->id) }}">Edit</a> |
            <form action="{{ route('user.destroy', $u->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin hapus user ini?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
