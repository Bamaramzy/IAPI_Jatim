<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ppl extends Model
{
    protected $fillable =
    [
        'video_url',
        'pdf_url',
        'status',
    ];
}
