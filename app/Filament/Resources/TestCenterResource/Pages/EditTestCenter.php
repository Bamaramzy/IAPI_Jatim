<?php

namespace App\Filament\Resources\TestCenterResource\Pages;

use App\Filament\Resources\TestCenterResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTestCenter extends EditRecord
{
    protected static string $resource = TestCenterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
