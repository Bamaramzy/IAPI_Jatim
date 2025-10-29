<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PeraturanSpapResource\Pages;
use App\Models\PeraturanSpap;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PeraturanSpapResource extends Resource
{
    protected static ?string $model = PeraturanSpap::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Peraturan';
    protected static ?string $navigationLabel = 'Peraturan SPAP';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('kategori')->required(),
            Forms\Components\TextInput::make('judul')->required(),
            Forms\Components\Textarea::make('deskripsi'),

            Forms\Components\FileUpload::make('thumbnail')
                ->image()
                ->directory('peraturan_spap/thumbnails')
                ->label('Thumbnail'),

            Forms\Components\TextInput::make('pdf_1_judul')->label('Judul PDF 1'),
            Forms\Components\FileUpload::make('pdf_1_url')
                ->directory('peraturan_spap/pdfs')
                ->label('File PDF 1'),

            Forms\Components\TextInput::make('pdf_2_judul')->label('Judul PDF 2'),
            Forms\Components\FileUpload::make('pdf_2_url')
                ->directory('peraturan_spap/pdfs')
                ->label('File PDF 2'),

            Forms\Components\TextInput::make('pdf_3_judul')->label('Judul PDF 3'),
            Forms\Components\FileUpload::make('pdf_3_url')
                ->directory('peraturan_spap/pdfs')
                ->label('File PDF 3'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kategori')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('judul')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('deskripsi')->limit(50),
                Tables\Columns\ImageColumn::make('thumbnail')->label('Thumbnail'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPeraturanSpaps::route('/'),
            'create' => Pages\CreatePeraturanSpap::route('/create'),
            'edit' => Pages\EditPeraturanSpap::route('/{record}/edit'),
        ];
    }
}
