<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Buku</title>
</head>
<body>
    <h1>Halaman Input Data Buku</h1>
    <form action="/buku" method="POST">
    @csrf
    @if (session('hasil'))
        {{ session('hasil') }}
    @endif
        <h2>Judul</h2>
        <input type="text" name="judul">
        <h2>Tahun</h2>
        <input type="text" name="tahun">
        <h2>Stok</h2>
        <input type="text" name="stok">
        <br>
        <button type="submit">SUBMIT</button>
    </form>
    <table border="1">
        <thead>
            <tr>
                <td>Judul</td>
                <td>Tahun</td>
                <td>Stok</td>
                <td>Opsi</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($buku as $b)
                <tr>
                    <td>{{ $b->judul }}</td>
                    <td>{{ $b->tahun }}</td>
                    <td>{{ $b->stok }}</td>
                    <td>
                        <form action="/buku/{{ $b->id }}" method="POST">
                            @csrf
                            @method ('DELETE')
                            <button type="submit">DELETE</button>
                        </form>
                        <a href="/buku/{{ $b->id }}/edit">EDIT</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>