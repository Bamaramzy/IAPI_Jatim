<?php

namespace App\Models;

use App\Traits\HasActivityLog;
use Illuminate\Database\Eloquent\Model;

class JalurReguler extends Model
{
    use HasActivityLog;
    protected $fillable =
    [
        'kategori',
        'judul',
        'konten',
        'file',
        'link'
    ];
}
