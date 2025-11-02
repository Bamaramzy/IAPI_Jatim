<?php

namespace App\Models;

use App\Traits\HasActivityLog;
use Illuminate\Database\Eloquent\Model;

class BrevetKuasa extends Model
{
    use HasActivityLog;
    protected $table = 'brevets_kuasa';
    protected $fillable = [
        'judul',
        'brosur',
        'link_daftar',
        'status',
    ];
}
