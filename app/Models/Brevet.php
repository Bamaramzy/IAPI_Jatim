<?php

namespace App\Models;

use App\Traits\HasActivityLog;
use Illuminate\Database\Eloquent\Model;

class Brevet extends Model
{
    use HasActivityLog;
    protected $fillable =
    [
        'judul',
        'brosur',
        'link_daftar',
        'status',
    ];
}
