<?php

namespace App\Filament\Resources\WorkshopAbResource\Pages;

use App\Filament\Resources\WorkshopAbResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWorkshopAb extends EditRecord
{
    protected static string $resource = WorkshopAbResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
