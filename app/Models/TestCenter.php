<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestCenter extends Model
{
    protected $table = 'test_centers';
    protected $fillable = [
        'kode',
        'nama',
        'alamat',
        'kota',
        'telepon'
    ];
}
