<?php

namespace App\Models;

use App\Traits\HasActivityLog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\InformasiResource;

class Informasi extends Model
{
    use HasFactory;
    use HasActivityLog;
    protected $table = 'informasis';
    protected $fillable = [
        'judul',
        'gambar',
        'link'
    ];

    public function getFilamentUrl()
    {
        return InformasiResource::getUrl('edit', ['record' => $this]);
    }
}
