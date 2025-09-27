<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrevetKuasa extends Model
{
    protected $table = 'brevets_kuasa';

    protected $fillable = [
        'judul',
        'brosur',
        'link_daftar',
        'status',
    ];
}
