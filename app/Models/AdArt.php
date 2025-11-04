<?php

namespace App\Models;

use App\Traits\HasActivityLog;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\AdArtResource;

class AdArt extends Model
{
    use HasActivityLog;
    protected $table = 'ad_arts';
    protected $fillable = [
        'judul',
        'status',
        'file_pdf',
        'link_drive',
        'cover',
    ];

    public function getFilamentUrl(): string
    {
        return AdArtResource::getUrl('edit', ['record' => $this]);
    }
}
