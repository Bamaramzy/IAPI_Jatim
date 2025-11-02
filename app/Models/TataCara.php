<?php

namespace App\Models;

use App\Traits\HasActivityLog;
use Illuminate\Database\Eloquent\Model;

class TataCara extends Model
{
    use HasActivityLog;
    protected $table = 'tata_caras';
    protected $fillable = [
        'judul',
        'status',
        'file_pdf',
        'link_drive',
        'cover',
    ];
}
