<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Warga</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f9fc;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 700px;
            margin: 40px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            padding: 20px 30px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th {
            text-align: left;
            width: 35%;
            color: #555;
            padding: 8px;
        }
        td {
            padding: 8px;
            color: #222;
        }
        .btn {
            display: inline-block;
            padding: 8px 15px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            margin-top: 15px;
        }
        .btn-back {
            background-color: #6c757d;
            color: white;
        }
        .btn-edit {
            background-color: #ffc107;
            color: #222;
        }
        .btn:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Detail Warga</h2>
    <table>
        <tr>
            <th>Nama Lengkap</th>
            <td>{{ $warga->nama_lengkap }}</td>
        </tr>
        <tr>
            <th>NIK</th>
            <td>{{ $warga->nik }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $warga->alamat }}</td>
        </tr>
        <tr>
            <th>No Telepon</th>
            <td>{{ $warga->no_telepon ?? '-' }}</td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td>{{ $warga->jenis_kelamin }}</td>
        </tr>
        <tr>
            <th>Dibuat Pada</th>
            <td>{{ $warga->created_at->format('d M Y H:i') }}</td>
        </tr>
        <tr>
            <th>Diperbarui Pada</th>
            <td>{{ $warga->updated_at->format('d M Y H:i') }}</td>
        </tr>
    </table>

    <a href="{{ route('warga.index') }}" class="btn btn-back">← Kembali</a>
    <a href="{{ route('warga.edit', $warga->id) }}" class="btn btn-edit">Edit</a>
</div>
</body>
</html>
