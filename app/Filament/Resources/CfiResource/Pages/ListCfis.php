<?php

namespace App\Filament\Resources\CfiResource\Pages;

use App\Filament\Resources\CfiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCfis extends ListRecords
{
    protected static string $resource = CfiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
