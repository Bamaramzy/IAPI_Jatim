<?php

namespace App\Models;

use App\Traits\HasActivityLog;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\WorkshopPenyetaraanKategoriResource;

class Video extends Model
{
    use HasActivityLog;
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

    public function getFilamentUrl()
    {
        return WorkshopPenyetaraanKategoriResource::getUrl('edit', ['record' => $this]);
    }
}
