<?php

namespace App\Filament\Resources;

use App\Models\DewanPengawas;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Filament\Resources\DewanPengawasResource\Pages;

class DewanPengawasResource extends Resource
{
    protected static ?string $model = DewanPengawas::class;
    protected static ?string $navigationIcon = 'heroicon-o-eye';
    protected static ?string $navigationGroup = 'Tentang Kami';
    protected static ?string $navigationLabel = 'Dewan Pengawas';
    protected static ?string $pluralLabel = 'Daftar Dewan Pengawas';
    protected static ?string $slug = 'dewan-pengawas';
    public static function getNavigationBadge(): ?string
    {
        return (string) DewanPengawas::count();
    }
    public static function getNavigationBadgeColor(): ?string
    {
        return DewanPengawas::count() > 0 ? 'success' : 'danger';
    }
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

                Forms\Components\FileUpload::make('gambar')
                    ->label('Gambar')
                    ->image()
                    ->directory('dewan_pengawas')
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
                Tables\Columns\ImageColumn::make('gambar')->label('Gambar'),
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
            'index' => Pages\ListDewanPengawas::route('/'),
            'create' => Pages\CreateDewanPengawas::route('/create'),
            'edit' => Pages\EditDewanPengawas::route('/{record}/edit'),
        ];
    }
}
