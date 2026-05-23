<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Anggota</title>
</head>
<body>
    <h1>Edit Data Anggota</h1>
    <form action="/anggota/{{ $anggota->id }}" method="POST">
        @csrf
        @method ('PUT')
        @if (session('hasil'))
            {{ session('hasil') }}
        @endif
        <h2>Nama</h2>
        <input type="text" name="nama" value="{{ $anggota->nama }}">
        <h2>Email</h2>
        <input type="text" name="email" value="{{ $anggota->email }}">
        <h2>Telepon</h2>
        <input type="text" name="telepon" value="{{ $anggota->telepon }}">
        <br>
        <button type="submit">SUBMIT</button>
    </form>
</body>
</html>