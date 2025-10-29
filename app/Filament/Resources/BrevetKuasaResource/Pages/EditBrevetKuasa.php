<?php

namespace App\Filament\Resources\BrevetKuasaResource\Pages;

use App\Filament\Resources\BrevetKuasaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBrevetKuasa extends EditRecord
{
    protected static string $resource = BrevetKuasaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
