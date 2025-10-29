<?php

namespace App\Filament\Resources\CfiResource\Pages;

use App\Filament\Resources\CfiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCfi extends EditRecord
{
    protected static string $resource = CfiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
