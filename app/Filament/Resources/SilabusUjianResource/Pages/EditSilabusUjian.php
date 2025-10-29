<?php

namespace App\Filament\Resources\SilabusUjianResource\Pages;

use App\Filament\Resources\SilabusUjianResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSilabusUjian extends EditRecord
{
    protected static string $resource = SilabusUjianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
