<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'judul', 'slug', 'isi', 'status', 'kategori_id', 'gambar_sampul'];

    public function penulis()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function scopeTerbit($query)
    {
        return $query->where('status', 'terbit');
    }

    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }
}