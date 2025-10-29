<?php

namespace App\Filament\Resources\PeraturanProfesiResource\Pages;

use App\Filament\Resources\PeraturanProfesiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPeraturanProfesis extends ListRecords
{
    protected static string $resource = PeraturanProfesiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
