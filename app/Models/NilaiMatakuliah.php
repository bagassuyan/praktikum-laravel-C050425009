<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiMatakuliah extends Model
{
    protected $guarded = ['id'];

    // Definisikan relasi ke Mahasiswa (Belongs To)
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    // (Opsional) Jika relasi ke Matakuliah juga dibutuhkan:
    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'matakuliah_id');
    }
}