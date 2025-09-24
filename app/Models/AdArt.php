<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdArt extends Model
{
    protected $table = 'ad_arts';
    protected $fillable = [
        'judul',
        'status',
        'file_pdf',
        'link_drive',
        'cover',
    ];
}
