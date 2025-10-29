<?php

namespace App\Filament\Resources\TatacaraResource\Pages;

use App\Filament\Resources\TatacaraResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTatacara extends EditRecord
{
    protected static string $resource = TatacaraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
