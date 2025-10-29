<h2>Tambah User</h2>
<form action="{{ route('user.store') }}" method="POST">
    @csrf
    <label>Nama</label>
    <input type="text" name="name" required>

    <label>Email</label>
    <input type="email" name="email" required>

    <label>Password</label>
    <input type="password" name="password" required>

    <label>Username</label>
    <input type="text" name="username" required>


    <button type="submit">Simpan</button>
</form>
