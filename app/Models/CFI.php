<?php

namespace App\Models;

use App\Traits\HasActivityLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CFI extends Model
{
    use HasFactory;
    use HasActivityLog;
    protected $table = 'cfis';
    protected $fillable = [
        'gambar',
        'link',
    ];
}
