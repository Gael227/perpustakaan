<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    public function peminjaman() {
        return $this->hasMany(Peminjaman::class);
    }
    protected $fillable = ['nama', 'email', 'telepon'];
}
