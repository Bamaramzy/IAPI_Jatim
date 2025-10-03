<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkshopAB extends Model
{
    protected $table = 'workshop_abs';
    protected $fillable = [
        'pdf',
        'link_pdf',
        'link_form'
    ];
}
