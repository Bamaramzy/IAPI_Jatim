<?php

namespace App\Traits;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

trait HasActivityLog
{
    use LogsActivity;

    protected static $logAttributes = ['*'];
    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        $name = class_basename($this);
        return LogOptions::defaults()
            ->useLogName($name)
            ->logAll()
            ->setDescriptionForEvent(fn(string $eventName) => "Perubahan data {$name} ({$eventName})");
    }
}
