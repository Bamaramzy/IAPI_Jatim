<?php

namespace App\Filament\Resources\WaiverPpakResource\Pages;

use App\Filament\Resources\WaiverPpakResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWaiverPpak extends EditRecord
{
    protected static string $resource = WaiverPpakResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
