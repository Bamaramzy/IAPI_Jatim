<?php

namespace App\Models;

use App\Traits\HasActivityLog;
use Illuminate\Database\Eloquent\Model;

class PeraturanProfesi extends Model
{
    use HasActivityLog;
    protected $table = 'peraturan_profesi';
    protected $fillable = [
        'kategori',
        'judul',
        'file_path',
        'link_url',
    ];
}
