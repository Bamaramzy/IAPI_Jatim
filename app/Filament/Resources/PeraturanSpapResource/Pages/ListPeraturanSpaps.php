<?php

namespace App\Filament\Resources\PeraturanSpapResource\Pages;

use App\Filament\Resources\PeraturanSpapResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPeraturanSpaps extends ListRecords
{
    protected static string $resource = PeraturanSpapResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
