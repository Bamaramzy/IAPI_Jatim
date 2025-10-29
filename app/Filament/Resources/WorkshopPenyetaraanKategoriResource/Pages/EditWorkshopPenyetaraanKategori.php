<?php

namespace App\Filament\Resources\WorkshopPenyetaraanKategoriResource\Pages;

use App\Filament\Resources\WorkshopPenyetaraanKategoriResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWorkshopPenyetaraanKategori extends EditRecord
{
    protected static string $resource = WorkshopPenyetaraanKategoriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
