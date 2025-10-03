<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    // Nama tabel sesuai migration
    protected $table = 'workshop_penyetaraan_kategori';

    protected $fillable = ['nama_kategori', 'slug'];

    // Relasi ke PDF
    public function pdfs()
    {
        return $this->hasMany(Pdf::class, 'kategori_id');
    }

    // Relasi ke Video
    public function videos()
    {
        return $this->hasMany(Video::class, 'kategori_id');
    }
}
