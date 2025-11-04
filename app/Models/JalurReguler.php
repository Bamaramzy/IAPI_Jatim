<?php

namespace App\Models;

use App\Traits\HasActivityLog;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\JalurRegulerResource;

class JalurReguler extends Model
{
    use HasActivityLog;
    protected $fillable =
    [
        'kategori',
        'judul',
        'konten',
        'file',
        'link'
    ];

    public function getFilamentUrl()
    {
        return JalurRegulerResource::getUrl('edit', ['record' => $this]);
    }
}
