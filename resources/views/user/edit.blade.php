<h2>Edit User</h2>
<form action="{{ route('user.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <p>Nama: <input type="text" name="name" value="{{ old('name', $user->name) }}"></p>
    <p>Email: <input type="email" name="email" value="{{ old('email', $user->email) }}"></p>
    <p>Password (biarkan kosong jika tidak diubah): <input type="password" name="password"></p>
    <button type="submit">Update</button>
</form>
