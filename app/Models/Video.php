<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'workshop_penyetaraan_video';
    protected $fillable =
    [
        'kategori_id',
        'judul',
        'video_url',
        'thumbnail_url'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
