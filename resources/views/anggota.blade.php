<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Anggota</title>
</head>
<body>
    <h1>Halaman Anggota</h1>
    <form action="/anggota" method="POST">
        @csrf
        @if (session('hasil'))
            {{ session('hasil') }}
        @endif
        <h2>Nama</h2>
        <input type="text" name="nama">
        <h2>Email</h2>
        <input type="text" name="email">
        <h2>Telepon</h2>
        <input type="text" name="telepon">
        <br>
        <button type="submit">SUBMIT</button>
    </form>
    <table border="1">
        <thead>
            <tr>
                <td>Nama</td>
                <td>Email</td>
                <td>Telepon</td>
                <td>Opsi</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($anggota as $a)
                <tr>
                    <td>{{ $a->nama }}</td>
                    <td>{{ $a->email }}</td>
                    <td>{{ $a->telepon }}</td>
                    <td>
                        <form action="/anggota/{{ $a->id }}" method="POST">
                            @method ('DELETE')
                            <button type="submit">DELETE</button>
                        </form>
                        <a href="/anggota/{{ $a->id }}/edit">EDIT</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>