<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Kejadian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h3 class="mb-4">Edit Data Kejadian Bencana</h3>

    <form action="{{ route('guest.kejadian.update', $kejadian->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Bencana</label>
            <input type="text" name="nama_bencana" class="form-control"
                   value="{{ old('nama_bencana', $kejadian->nama_bencana) }}" required>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control"
                   value="{{ old('tanggal', $kejadian->tanggal) }}" required>
        </div>

        <div class="mb-3">
            <label>Lokasi</label>
            <input type="text" name="lokasi" class="form-control"
                   value="{{ old('lokasi', $kejadian->lokasi) }}" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3" required>{{ old('deskripsi', $kejadian->deskripsi) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('guest.kejadian.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</body>
</html>
