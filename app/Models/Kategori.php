<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'workshop_penyetaraan_kategori';

    protected $fillable =
    [
        'nama_kategori',
        'slug'
    ];

    public function pdfs()
    {
        return $this->hasMany(Pdf::class, 'kategori_id');
    }

    public function videos()
    {
        return $this->hasMany(Video::class, 'kategori_id');
    }
}
