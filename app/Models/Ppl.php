<?php

namespace App\Models;

use App\Traits\HasActivityLog;
use Illuminate\Database\Eloquent\Model;

class Ppl extends Model
{
    use HasActivityLog;
    protected $fillable =
    [
        'video_url',
        'pdf_url',
        'status',
    ];
}
