<?php

namespace App\Models;

use App\Traits\HasActivityLog;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\TestCenterResource;

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

    public function getFilamentUrl()
    {
        return TestCenterResource::getUrl('edit', ['record' => $this]);
    }
}
