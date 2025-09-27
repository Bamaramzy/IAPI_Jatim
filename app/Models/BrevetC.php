<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrevetC extends Model
{
    protected $table = 'brevets_c';

    protected $fillable = [
        'judul',
        'brosur',
        'link_daftar',
        'status',
    ];
}
