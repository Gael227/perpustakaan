<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    public function index() {
        $anggota = Anggota::all();

        return view('anggota', compact('anggota'));
    }

    public function store(Request $request) {
        $request->validate([
            'nama'=>['required'],
            'email'=>['required'],
            'telepon'=>['required'],
        ]);

        $anggota = Anggota::create($request->all());
        return redirect('anggota')->with('hasil', "DATA ANGGOTA BERHASIL DITAMBAHKAN!");
    }

    public function edit($id) {
        $anggota = Anggota::findOrFail($id);

        return view('anggota-edit', compact('anggota'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama'=>['required'],
            'email'=>['required'],
            'telepon'=>['required'],
        ]);

        Anggota::findOrFail($id)->update($request->all());
        return redirect('anggota')->with('hasil', "DATA ANGGOTA BERHASIL DI-UPDATE!");
    }

    public function destroy($id) {
        Anggota::findOrFail($id)->delete();

        return redirect('anggota')->with('hasil', "DATA ANGGOTA BERHASIL DIHAPUS!");
    }
}
