<?php

namespace App\Models;

use App\Traits\HasActivityLog;
use Illuminate\Database\Eloquent\Model;

class TestCenter extends Model
{
    use HasActivityLog;
    protected $table = 'test_centers';
    protected $fillable = [
        'kode',
        'nama',
        'alamat',
        'kota',
        'telepon'
    ];
}
