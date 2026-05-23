<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Edit Buku</title>
</head>
<body>
    <h1>Edit Data Buku</h1>
    <form action="/buku/{{ $buku->id }}" method="POST">
    @csrf
    @method ('PUT')
    @if (session('hasil'))
        {{ session('hasil') }}
    @endif
        <h2>Judul</h2>
        <input type="text" name="judul" value="{{ $buku->judul }}">
        <h2>Tahun</h2>
        <input type="text" name="tahun" value="{{ $buku->tahun }}">
        <h2>Stok</h2>
        <input type="text" name="stok" value="{{ $buku->stok }}">
        <br>
        <button type="submit">SUBMIT</button>
    </form>
</body>
</html>