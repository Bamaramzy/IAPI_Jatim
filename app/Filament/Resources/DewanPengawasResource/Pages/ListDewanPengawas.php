<?php

namespace App\Filament\Resources\DewanPengawasResource\Pages;

use App\Filament\Resources\DewanPengawasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDewanPengawas extends ListRecords
{
    protected static string $resource = DewanPengawasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
