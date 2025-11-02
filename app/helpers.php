<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;

if (!function_exists('filament_edit_link')) {
    function filament_edit_link($model): string
    {
        if (!$model || !isset($model->id)) {
            return '#';
        }

        $baseName = Str::kebab(class_basename($model));
        $possibleRoutes = [
            "filament.admin.resources.{$baseName}.edit",
            "filament.admin.resources." . Str::plural($baseName) . ".edit",
        ];

        foreach ($possibleRoutes as $routeName) {
            if (Route::has($routeName)) {
                return route($routeName, $model->id);
            }
        }

        return '#';
    }
}
