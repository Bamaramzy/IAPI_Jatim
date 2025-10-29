<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestCenterResource\Pages;
use App\Models\TestCenter;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Form;

class TestCenterResource extends Resource
{
    protected static ?string $model = TestCenter::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    protected static ?string $navigationGroup = 'Sertifikasi';
    protected static ?string $navigationLabel = 'Test Center';
    protected static ?string $pluralModelLabel = 'Test Center';
    protected static ?string $slug = 'test-centers';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('kode')
                ->label('Kode')
                ->required()
                ->maxLength(20),

            Forms\Components\TextInput::make('nama')
                ->label('Nama Test Center')
                ->required()
                ->maxLength(255),

            Forms\Components\Textarea::make('alamat')
                ->label('Alamat')
                ->required()
                ->rows(3),

            Forms\Components\TextInput::make('kota')
                ->label('Kota')
                ->required()
                ->maxLength(100),

            Forms\Components\TextInput::make('telepon')
                ->label('Telepon')
                ->tel()
                ->maxLength(20),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kode')->label('Kode')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('nama')->label('Nama')->searchable(),
                Tables\Columns\TextColumn::make('alamat')->label('Alamat')->limit(50),
                Tables\Columns\TextColumn::make('kota')->label('Kota')->sortable(),
                Tables\Columns\TextColumn::make('telepon')->label('Telepon'),
                Tables\Columns\TextColumn::make('created_at')->label('Dibuat')->dateTime('d M Y H:i')->sortable(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTestCenters::route('/'),
            'create' => Pages\CreateTestCenter::route('/create'),
            'edit' => Pages\EditTestCenter::route('/{record}/edit'),
        ];
    }
}
