<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WaiverPpakResource\Pages;
use App\Models\WaiverPpak;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Form;

class WaiverPpakResource extends Resource
{
    protected static ?string $model = WaiverPpak::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationGroup = 'Sertifikasi';
    protected static ?string $navigationLabel = 'Waiver PPAK';
    protected static ?string $slug = 'waiver-ppak';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nama_universitas')
                ->label('Nama Universitas')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('akreditasi')
                ->label('Akreditasi')
                ->required()
                ->maxLength(5),

            Forms\Components\TextInput::make('jumlah_waiver')
                ->label('Jumlah Waiver')
                ->numeric()
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_universitas')->searchable(),
                Tables\Columns\TextColumn::make('akreditasi'),
                Tables\Columns\TextColumn::make('jumlah_waiver')->label('Jumlah Waiver'),
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
            'index' => Pages\ListWaiverPpaks::route('/'),
            'create' => Pages\CreateWaiverPpak::route('/create'),
            'edit' => Pages\EditWaiverPpak::route('/{record}/edit'),
        ];
    }
}
