<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WorkshopPenyetaraanKategoriResource\Pages;
use App\Filament\Resources\WorkshopPenyetaraanKategoriResource\RelationManagers\PdfsRelationManager;
use App\Filament\Resources\WorkshopPenyetaraanKategoriResource\RelationManagers\VideosRelationManager;
use App\Models\Kategori;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class WorkshopPenyetaraanKategoriResource extends Resource
{
    protected static ?string $model = Kategori::class;
    protected static ?string $navigationGroup = 'Sertifikasi';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationLabel(): string
    {
        return 'Workshop Penyetaraan';
    }

    public static function getSlug(): string
    {
        return 'workshop-penyetaraan-kategori';
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nama_kategori')
                ->label('Nama Kategori')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('slug')
                ->required()
                ->unique(ignoreRecord: true)
                ->maxLength(255),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_kategori')
                    ->label('Nama Kategori')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug'),

                Tables\Columns\TextColumn::make('pdfs_count')
                    ->counts('pdfs')
                    ->label('Jumlah PDF'),

                Tables\Columns\TextColumn::make('videos_count')
                    ->counts('videos')
                    ->label('Jumlah Video'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            PdfsRelationManager::class,
            VideosRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWorkshopPenyetaraanKategoris::route('/'),
            'create' => Pages\CreateWorkshopPenyetaraanKategori::route('/create'),
            'edit' => Pages\EditWorkshopPenyetaraanKategori::route('/{record}/edit'),
        ];
    }
}
