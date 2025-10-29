<?php

namespace App\Filament\Resources\DewanPengawasResource\Pages;

use App\Filament\Resources\DewanPengawasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDewanPengawas extends EditRecord
{
    protected static string $resource = DewanPengawasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
