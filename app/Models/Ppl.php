<?php

namespace App\Models;

use App\Traits\HasActivityLog;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\PplResource;

class Ppl extends Model
{
    use HasActivityLog;
    protected $fillable =
    [
        'video_url',
        'pdf_url',
        'status',
    ];

    public function getFilamentUrl()
    {
        return PplResource::getUrl('edit', ['record' => $this]);
    }
}
