<?php

namespace App\Models;

use App\Traits\HasActivityLog;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\WorkshopPenyetaraanKategoriResource;

class Pdf extends Model
{
    use HasActivityLog;
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

    public function getFilamentUrl()
    {
        return WorkshopPenyetaraanKategoriResource::getUrl('edit', ['record' => $this]);
    }
}
