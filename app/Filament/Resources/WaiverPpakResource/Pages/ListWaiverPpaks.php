<?php

namespace App\Filament\Resources\WaiverPpakResource\Pages;

use App\Filament\Resources\WaiverPpakResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWaiverPpaks extends ListRecords
{
    protected static string $resource = WaiverPpakResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
