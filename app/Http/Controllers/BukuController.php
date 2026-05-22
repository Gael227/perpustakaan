<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    public function index() {
        $buku = Buku::all();

        return view('/buku', compact('buku'));
    }

    public function store(Request $request) {
        $request->validate([
            'judul'=>['required'],
            'tahun'=>['required'|'min:0'|'max:2026'],
            'stok'=>['required'|'min:0']
        ]);

        $dataBuku = Buku::create($request->all());
        return redirect('buku')->with('hasil',"DATA BUKU BERHASIL DITAMBAHKAN!");
    }

    public function edit($id) {
        $buku = Buku::findOrFail($id);

        return view('/buku-edit', compact('buku'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'judul'=>['required'],
            'tahun'=>['required'|'min:0'|'max:2026'],
            'stok'=>['required'|'min:0']
        ]);

        Buku::findOrFail($id)->update($request->all());
        return redirect('buku')->with('hasil', "DATA BERHASIL DI-UPDATE!");
    }

    public function destroy($id) {
        Buku::findOrFail($id)->delete();

        return redirect('buku')->with('hasil', "DATA BERHASIL DIHAPUS!");
    }
}
