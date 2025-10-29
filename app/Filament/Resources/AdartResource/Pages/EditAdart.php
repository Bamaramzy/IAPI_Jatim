<?php

namespace App\Filament\Resources\AdartResource\Pages;

use App\Filament\Resources\AdartResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAdart extends EditRecord
{
    protected static string $resource = AdartResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
