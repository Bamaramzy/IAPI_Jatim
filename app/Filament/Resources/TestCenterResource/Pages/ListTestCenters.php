<?php

namespace App\Filament\Resources\TestCenterResource\Pages;

use App\Filament\Resources\TestCenterResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTestCenters extends ListRecords
{
    protected static string $resource = TestCenterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
