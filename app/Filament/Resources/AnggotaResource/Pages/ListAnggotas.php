<?php

namespace App\Filament\Resources\AnggotaResource\Pages;

use App\Filament\Resources\AnggotaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AnggotaImport;
use Filament\Forms;
use Filament\Notifications\Notification;

class ListAnggotas extends ListRecords
{
    protected static string $resource = AnggotaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('import_excel')
                ->label('Import Excel')
                ->icon('heroicon-o-arrow-up-tray')
                ->form([
                    Forms\Components\FileUpload::make('file')
                        ->label('Pilih File Excel')
                        ->required()
                        ->acceptedFileTypes(['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.ms-excel', 'text/csv']),
                ])
                ->action(function (array $data): void {
                    $filePath = storage_path('app/public/' . $data['file']);

                    Excel::import(new AnggotaImport, $filePath);

                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }

                    Notification::make()
                        ->title('Import berhasil!')
                        ->success()
                        ->send();
                })
        ];
    }
}
