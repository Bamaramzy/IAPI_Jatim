<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TataCara extends Model
{
    protected $table = 'tata_caras';
    protected $fillable = [
        'judul',
        'status',
        'file_pdf',
        'link_drive',
        'cover',
    ];
}
