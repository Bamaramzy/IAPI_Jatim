<?php

namespace App\Filament\Resources\JalurRegulerResource\Pages;

use App\Filament\Resources\JalurRegulerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJalurReguler extends EditRecord
{
    protected static string $resource = JalurRegulerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
