<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CFI extends Model
{
    use HasFactory;
    protected $table = 'cfis';
    protected $fillable = [
        'gambar',
        'link',
    ];
}
