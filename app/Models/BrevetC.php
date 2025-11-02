<?php

namespace App\Models;

use App\Traits\HasActivityLog;
use Illuminate\Database\Eloquent\Model;

class BrevetC extends Model
{
    use HasActivityLog;
    protected $table = 'brevets_c';
    protected $fillable = [
        'judul',
        'brosur',
        'link_daftar',
        'status',
    ];
}
