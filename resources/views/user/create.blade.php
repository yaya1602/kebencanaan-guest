<h2>Tambah User</h2>
<form action="{{ route('user.store') }}" method="POST">
    @csrf
    <p>Nama: <input type="text" name="name" value="{{ old('name') }}"></p>
    <p>Email: <input type="email" name="email" value="{{ old('email') }}"></p>
    <p>Password: <input type="password" name="password"></p>
    <button type="submit">Simpan</button>
</form>
