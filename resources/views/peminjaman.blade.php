<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Peminjaman</title>
</head>
<body>
    <h1>Halaman Peminjaman</h1>
    <form action="/peminjaman" method="POST">
        @csrf
        @if (session('hasil'))
            {{ session('hasil') }}
        @endif
        <label for="anggota"><h2>Nama Peminjam</h2></label>
        <select name="anggota_id">
            @foreach ($anggota as $a)
                <option value="{{ $a->id }}">{{ $a->nama }}</option>
            @endforeach
        </select>
        <label for="buku"><h2>Judul buku yang ingin dipinjam</h2></label>
        <select name="buku_id">
            @foreach ($buku as $b)
                <option value="{{ $b->id }}">{{ $b->judul }}</option>            
                @endforeach
            </select>
            <label for="tanggal_pinjam"><h2>Tanggal peminjaman</h2></label>
            <input type="date" name="tanggal_pinjam">
            <br>
            <button type="submit">SUBMIT PEMINJAMAN BUKU</button>
        </form>

        <table border="1">
            <thead>
                <tr>
                    <td>Anggota</td>
                    <td>Buku</td>
                    <td>Tanggal Pinjam</td>
                    <td>Status</td>
                    <td>Tanggal Kembali</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($peminjaman as $p)
                    <tr>
                        <td>{{ $p->anggota->nama }}</td>
                        <td>{{ $p->buku->judul }}</td>
                        <td>{{ $p->tanggal_pinjam }}</td>
                        <td>{{ $p->status }}</td>
                        <td>{{ $p->tanggal_kembali ?? '-' }}</td> <!--- jika tanggal kembali kosong/null, - akan ditampilkan -->
                        <td>
                            @if ($p->status === 'dipinjam')
                                <form action="/peminjaman/{{ $p->id }}" method="POST">
                                    @csrf
                                    @method ('PUT')
                                    <button type="submit">KEMBALIKAN</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


</body>
</html>