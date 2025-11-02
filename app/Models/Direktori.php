<?php

namespace App\Models;

use App\Traits\HasActivityLog;
use Illuminate\Database\Eloquent\Model;

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
}
