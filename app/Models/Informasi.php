<?php

namespace App\Models;

use App\Traits\HasActivityLog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    use HasFactory;
    use HasActivityLog;
    protected $table = 'informasis';
    protected $fillable = [
        'judul',
        'gambar',
        'link'
    ];
}
