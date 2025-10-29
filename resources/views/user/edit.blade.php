<h2>Edit User</h2>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('user.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <p>
        Nama:
        <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
    </p>

    <p>
        Username:
        <input type="text" name="username" value="{{ old('username', $user->username) }}" required>
    </p>

    <p>
        Email:
        <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
    </p>

    <p>
        Password (biarkan kosong jika tidak diubah):
        <input type="password" name="password">
    </p>

    <button type="submit">Update</button>
    <a href="{{ route('user.index') }}">Batal</a>
</form>
