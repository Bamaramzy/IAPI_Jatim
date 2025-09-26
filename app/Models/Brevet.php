<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brevet extends Model
{
    protected $fillable =
    [
        'judul',
        'brosur',
        'link_daftar',
        'status',
    ];
}
