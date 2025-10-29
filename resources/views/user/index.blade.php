<!DOCTYPE html>
<html>
<head>
    <title>Daftar User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f8f9fa;
        }
        h2 {
            color: #333;
        }
        a {
            text-decoration: none;
            color: #007bff;
        }
        a:hover {
            text-decoration: underline;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #dee2e6;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #e9ecef;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        button {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 6px 10px;
            border-radius: 3px;
            cursor: pointer;
        }
        button:hover {
            background-color: #c82333;
        }
        .edit-link {
            color: #28a745;
            font-weight: bold;
        }
        .top-actions {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <h2>Daftar User</h2>

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

</body>
</html>
