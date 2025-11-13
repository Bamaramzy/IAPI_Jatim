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
    public static function getNavigationBadge(): ?string
    {
        return (string) PeraturanSpap::count();
    }
    public static function getNavigationBadgeColor(): ?string
    {
        return PeraturanSpap::count() > 0 ? 'success' : 'danger';
    }
    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('kategori')
                ->required()
                ->options([
                    'SPM' => 'SPM',
                    'SMM' => 'SMM',
                    'KERANGKA UNTUK PERIKATAN ASURANS' => 'KERANGKA UNTUK PERIKATAN ASURANS',
                    'SA' => 'SA',
                    'SPR' => 'SPR',
                    'SPA' => 'SPA',
                    'SJT' => 'SJT',
                    'SJI' => 'SJI',
                    'SJK' => 'SJK',
                    'SJL' => 'SJL',
                    'SJS' => 'SJS',
                ]),

            Forms\Components\TextInput::make('judul')->required(),
            Forms\Components\RichEditor::make('deskripsi')
                ->label('Deskripsi')
                ->required()
                ->toolbarButtons(['bold', 'italic', 'underline', 'link', 'bulletList', 'orderedList']),

            Forms\Components\FileUpload::make('thumbnail')
                ->image()
                ->directory('peraturan_spap/thumbnails')
                ->label('Thumbnail'),

            Forms\Components\TextInput::make('pdf_1_judul')->label('Judul PDF 1'),
            Forms\Components\TextInput::make('pdf_1_url')
                ->label('URL PDF 1')
                ->placeholder('https://drive.google.com/file/d/.../view?usp=preview'),

            Forms\Components\TextInput::make('pdf_2_judul')->label('Judul PDF 2'),
            Forms\Components\TextInput::make('pdf_2_url')
                ->label('URL PDF 2')
                ->placeholder('https://drive.google.com/file/d/.../view?usp=preview'),

            Forms\Components\TextInput::make('pdf_3_judul')->label('Judul PDF 3'),
            Forms\Components\TextInput::make('pdf_3_url')
                ->label('URL PDF 3')
                ->placeholder('https://drive.google.com/file/d/.../view?usp=preview'),
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
