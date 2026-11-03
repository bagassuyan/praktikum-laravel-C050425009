<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    // Nama tabel di database (opsional jika nama tabel sesuai konvensi: mahasiswas)
    protected $table = 'mahasiswas';

    // Kolom yang dapat diisi secara massal (mass assignment)
    protected $fillable = [
        'nim',
        'nama',
        'email',
        'prodi',
    ];

    protected $guarded = ['id'];

    // Definisikan relasi ke NilaiMatakuliah (One to Many)
    public function nilaiMatakuliahs()
    {
        return $this->hasMany(NilaiMatakuliah::class, 'mahasiswa_id');
    }
}