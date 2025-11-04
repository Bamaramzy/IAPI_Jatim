<?php

namespace App\Models;

use App\Traits\HasActivityLog;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\BrevetResource;

class Brevet extends Model
{
    use HasActivityLog;
    protected $fillable =
    [
        'judul',
        'brosur',
        'link_daftar',
        'status',
    ];

    public function getFilamentUrl(): string
    {
        return BrevetResource::getUrl('edit', ['record' => $this]);
    }
}
