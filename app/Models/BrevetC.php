<?php

namespace App\Models;

use App\Traits\HasActivityLog;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\BrevetCResource;

class BrevetC extends Model
{
    use HasActivityLog;
    protected $table = 'brevets_c';
    protected $fillable = [
        'judul',
        'brosur',
        'link_daftar',
        'status',
    ];

    public function getFilamentUrl(): string
    {
        return BrevetCResource::getUrl('edit', ['record' => $this]);
    }
}
