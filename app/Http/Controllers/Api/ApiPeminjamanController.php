<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;

class ApiPeminjamanController extends Controller
{
    public function index() {
        $peminjaman = Peminjaman::with('buku', 'anggota')->get();

        return response()->json([
            'data' => $peminjaman,
            'message' => 'success',
        ]);
    }
}
