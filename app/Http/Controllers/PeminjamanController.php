<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\Anggota;

class PeminjamanController extends Controller
{
    public function index() {
        $peminjaman = Peminjaman::all();
        $buku = Buku::all();
        $anggota = Anggota::all();

        return view('/peminjaman', compact('peminjaman', 'anggota', 'buku'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'anggota_id'=>'required',
            'buku_id'=>'required',
            'tanggal_pinjam'=>'required|date',
        ]);

        $buku = Buku::findOrFail($request->buku_id);

        if ($buku->stok < 1) {
            return redirect ('peminjaman')->with('hasil', "Stok Buku tidak ada, tidak dapat meminjam");
        }

        DB::transaction(function () use ($validated, $buku) {
            Peminjaman::create($validated);
            $buku->decrement('stok');
        });

        return redirect('peminjaman')->with('hasil',"Peminjaman {$buku->judul} berhasil dilakukan");
    }

    public function update($id) {
        $peminjaman = Peminjaman::findOrFail($id);
        $buku = $peminjaman->buku;

        $peminjaman->update([
            'status' => 'dikembalikan',
            'tanggal_kembali' => now(),
        ]);

        $buku->increment('stok');

        return redirect ('peminjaman')->with('hasil', "Buku {$buku->judul} berhasil dikembalikan");
    }

}
