<?php

namespace App\Filament\Resources\BrevetCResource\Pages;

use App\Filament\Resources\BrevetCResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBrevetC extends EditRecord
{
    protected static string $resource = BrevetCResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
