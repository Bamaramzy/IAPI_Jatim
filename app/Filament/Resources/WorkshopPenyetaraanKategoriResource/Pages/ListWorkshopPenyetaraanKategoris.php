<?php

namespace App\Filament\Resources\WorkshopPenyetaraanKategoriResource\Pages;

use App\Filament\Resources\WorkshopPenyetaraanKategoriResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWorkshopPenyetaraanKategoris extends ListRecords
{
    protected static string $resource = WorkshopPenyetaraanKategoriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
