<?php

namespace App\Models;

use App\Traits\HasActivityLog;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\TataCaraResource;

class TataCara extends Model
{
    use HasActivityLog;
    protected $table = 'tata_caras';
    protected $fillable = [
        'judul',
        'status',
        'file_pdf',
        'link_drive',
        'cover',
    ];

    public function getFilamentUrl()
    {
        return TataCaraResource::getUrl('edit', ['record' => $this]);
    }
}
