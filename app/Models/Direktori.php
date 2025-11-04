<?php

namespace App\Models;

use App\Traits\HasActivityLog;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\DirektoriResource;

class Direktori extends Model
{
    use HasActivityLog;
    protected $fillable = [
        'judul',
        'deskripsi',
        'link_drive',
        'file_pdf',
        'cover',
        'status'
    ];

    public function getFilamentUrl(): string
    {
        return DirektoriResource::getUrl('edit', ['record' => $this]);
    }
}
