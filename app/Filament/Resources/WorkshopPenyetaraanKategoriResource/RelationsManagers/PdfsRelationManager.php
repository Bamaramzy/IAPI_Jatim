<?php

namespace App\Filament\Resources\WorkshopPenyetaraanKategoriResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class PdfsRelationManager extends RelationManager
{
    protected static string $relationship = 'pdfs';
    protected static ?string $recordTitleAttribute = 'judul';

    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('judul')
                ->label('Judul PDF')
                ->required()
                ->maxLength(255),

            Forms\Components\FileUpload::make('file_path')
                ->label('File PDF')
                ->directory('uploads/penyetaraan/pdf')
                ->acceptedFileTypes(['application/pdf'])
                ->maxSize(5120),

            Forms\Components\TextInput::make('link_url')
                ->label('Link Google Drive')
                ->url()
                ->nullable()
                ->placeholder('https://drive.google.com/file/d/.../view?usp=preview')
                ->required(),

            Forms\Components\FileUpload::make('preview_thumbnail')
                ->label('Thumbnail')
                ->directory('uploads/penyetaraan/thumbnails')
                ->image()
                ->nullable(),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\ImageColumn::make('preview_thumbnail')
                    ->label('Thumbnail'),

                Tables\Columns\TextColumn::make('file_path')
                    ->label('File')
                    ->limit(40),

                Tables\Columns\TextColumn::make('link_url')
                    ->label('Link')
                    ->limit(40),

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
