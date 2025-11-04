<?php

namespace App\Models;

use App\Traits\HasActivityLog;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\PeraturanProfesiResource;

class PeraturanProfesi extends Model
{
    use HasActivityLog;
    protected $table = 'peraturan_profesi';
    protected $fillable = [
        'kategori',
        'judul',
        'file_path',
        'link_url',
    ];

    public function getFilamentUrl()
    {
        return PeraturanProfesiResource::getUrl('edit', ['record' => $this]);
    }
}
