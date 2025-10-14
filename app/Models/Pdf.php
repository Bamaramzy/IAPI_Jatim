<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pdf extends Model
{
    protected $table = 'workshop_penyetaraan_pdf';

    protected $fillable = [
        'kategori_id',
        'judul',
        'file_path',
        'link_url',
        'preview_thumbnail',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
