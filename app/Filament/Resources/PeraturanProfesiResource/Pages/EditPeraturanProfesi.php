<?php

namespace App\Filament\Resources\PeraturanProfesiResource\Pages;

use App\Filament\Resources\PeraturanProfesiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPeraturanProfesi extends EditRecord
{
    protected static string $resource = PeraturanProfesiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
