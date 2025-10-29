<?php

namespace App\Filament\Resources;

use App\Models\DewanPengurus;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Filament\Resources\DewanPengurusResource\Pages;

class DewanPengurusResource extends Resource
{
    protected static ?string $model = DewanPengurus::class;
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Tentang Kami';
    protected static ?string $navigationLabel = 'Dewan Pengurus';
    protected static ?string $pluralLabel = 'Daftar Dewan Pengurus';
    protected static ?string $slug = 'dewan-pengurus';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->label('Nama')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('jabatan')
                    ->label('Jabatan')
                    ->required()
                    ->maxLength(255),

                Forms\Components\FileUpload::make('foto')
                    ->label('Foto')
                    ->image()
                    ->directory('dewan_pengurus')
                    ->visibility('public')
                    ->maxSize(1024),

                Forms\Components\Textarea::make('keterangan')
                    ->label('Keterangan')
                    ->rows(3)
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')->label('Foto'),
                Tables\Columns\TextColumn::make('nama')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('jabatan')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->label('Dibuat'),
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
            'index' => Pages\ListDewanPengurus::route('/'),
            'create' => Pages\CreateDewanPengurus::route('/create'),
            'edit' => Pages\EditDewanPengurus::route('/{record}/edit'),
        ];
    }
}
