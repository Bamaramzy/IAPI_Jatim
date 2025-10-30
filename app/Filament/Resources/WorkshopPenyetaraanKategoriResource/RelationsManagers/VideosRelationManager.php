<?php

namespace App\Filament\Resources\WorkshopPenyetaraanKategoriResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class VideosRelationManager extends RelationManager
{
    protected static string $relationship = 'videos';
    protected static ?string $recordTitleAttribute = 'judul';

    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('judul')
                ->label('Judul Video')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('video_url')
                ->label('Video URL')
                ->url()
                ->required(),

            Forms\Components\FileUpload::make('thumbnail_url')
                ->label('Thumbnail')
                ->directory('uploads/penyetaraan/video_thumbnails')
                ->image()
                ->nullable(),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\ImageColumn::make('thumbnail_url')
                    ->label('Thumbnail'),

                Tables\Columns\TextColumn::make('video_url')
                    ->label('URL')
                    ->limit(60),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime(),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
