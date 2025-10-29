<?php

namespace App\Filament\Resources\BrevetKuasaResource\Pages;

use App\Filament\Resources\BrevetKuasaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBrevetKuasas extends ListRecords
{
    protected static string $resource = BrevetKuasaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
