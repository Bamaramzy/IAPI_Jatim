<?php

namespace App\Models;

use App\Traits\HasActivityLog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\WorkshopPenyetaraanKategoriResource;

class Kategori extends Model
{
    use HasFactory;
    use HasActivityLog;
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

    public function getFilamentUrl()
    {
        return WorkshopPenyetaraanKategoriResource::getUrl('edit', ['record' => $this]);
    }
}
