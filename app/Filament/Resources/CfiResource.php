<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CfiResource\Pages;
use App\Models\Cfi;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Form;

class CfiResource extends Resource
{
    protected static ?string $model = Cfi::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Sertifikasi';
    protected static ?string $navigationLabel = 'CFI';
    protected static ?string $slug = 'cfi';
    public static function getNavigationBadge(): ?string
    {
        return (string) Cfi::count();
    }
    public static function getNavigationBadgeColor(): ?string
    {
        return Cfi::count() > 0 ? 'success' : 'danger';
    }
    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\FileUpload::make('gambar')
                ->label('Gambar')
                ->required()
                ->directory('uploads/cfi')
                ->image(),

            Forms\Components\TextInput::make('link')
                ->label('Link')
                ->url(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('gambar')->label('Gambar'),
                Tables\Columns\TextColumn::make('link')->label('Link')->limit(40),
                Tables\Columns\TextColumn::make('created_at')->label('Dibuat')->dateTime('d M Y'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCfis::route('/'),
            'create' => Pages\CreateCfi::route('/create'),
            'edit' => Pages\EditCfi::route('/{record}/edit'),
        ];
    }
}
