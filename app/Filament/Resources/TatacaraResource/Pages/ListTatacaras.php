<?php

namespace App\Filament\Resources\TatacaraResource\Pages;

use App\Filament\Resources\TatacaraResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTatacaras extends ListRecords
{
    protected static string $resource = TatacaraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
