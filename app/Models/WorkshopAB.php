<?php

namespace App\Models;

use App\Traits\HasActivityLog;
use Illuminate\Database\Eloquent\Model;

class WorkshopAB extends Model
{
    use HasActivityLog;
    protected $table = 'workshop_abs';
    protected $fillable = [
        'pdf',
        'link_pdf',
        'link_form'
    ];
}
