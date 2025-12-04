<?php

namespace App\Models;

use App\Traits\HasActivityLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Filament\Resources\CFIResource;

class CFI extends Model
{
    use HasFactory;
    use HasActivityLog;
    protected $table = 'cfis';
    protected $fillable = [
        'gambar',
        'link',
    ];

    public function getFilamentUrl(): string
    {
        return CFIResource::getUrl('edit', ['record' => $this]);
    }
}
