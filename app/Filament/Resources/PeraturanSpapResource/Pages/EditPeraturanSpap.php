<?php

namespace App\Filament\Resources\PeraturanSpapResource\Pages;

use App\Filament\Resources\PeraturanSpapResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPeraturanSpap extends EditRecord
{
    protected static string $resource = PeraturanSpapResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
