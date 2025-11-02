<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PeraturanProfesiResource\Pages;
use App\Models\PeraturanProfesi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PeraturanProfesiResource extends Resource
{
    protected static ?string $model = PeraturanProfesi::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document';
    protected static ?string $navigationGroup = 'Peraturan';
    protected static ?string $navigationLabel = 'Peraturan Profesi';
    public static function getNavigationBadge(): ?string
    {
        return (string) PeraturanProfesi::count();
    }
    public static function getNavigationBadgeColor(): ?string
    {
        return PeraturanProfesi::count() > 0 ? 'success' : 'danger';
    }
    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('kategori')
                ->required()
                ->options([
                    'regulasi' => 'Regulasi',
                    'asosiasi' => 'Peraturan Asosiasi',
                    'pengurus' => 'Peraturan Pengurus',
                ]),

            Forms\Components\TextInput::make('judul')->required(),

            Forms\Components\FileUpload::make('file_path')
                ->directory('peraturan_profesi/files')
                ->label('File Dokumen'),

            Forms\Components\TextInput::make('link_url')
                ->url()
                ->label('Link')
                ->placeholder('https://drive.google.com/file/d/.../view?usp=preview'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kategori')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('judul')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('file_path')->label('File'),
                Tables\Columns\TextColumn::make('link_url')->label('Link'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPeraturanProfesis::route('/'),
            'create' => Pages\CreatePeraturanProfesi::route('/create'),
            'edit' => Pages\EditPeraturanProfesi::route('/{record}/edit'),
        ];
    }
}
