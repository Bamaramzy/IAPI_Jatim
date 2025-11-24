<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WorkshopAbResource\Pages;
use App\Models\WorkshopAB;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;

class WorkshopAbResource extends Resource
{
    protected static ?string $model = WorkshopAB::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-arrow-down';
    protected static ?string $navigationGroup = 'Sertifikasi';
    protected static ?string $navigationLabel = 'Workshop AB';
    protected static ?string $slug = 'workshop-ab';
    public static function getNavigationBadge(): ?string
    {
        return (string) WorkshopAB::count();
    }
    public static function getNavigationBadgeColor(): ?string
    {
        return WorkshopAB::count() > 0 ? 'success' : 'danger';
    }
    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\FileUpload::make('pdf')
                ->label('File PDF')
                ->directory('uploads/workshop_ab')
                ->acceptedFileTypes(['application/pdf']),

            Forms\Components\TextInput::make('link_pdf')
                ->label('Link Google Drive')
                ->url()
                ->nullable()
                ->placeholder('https://drive.google.com/file/d/.../view?usp=preview')
                ->required(),

            Forms\Components\TextInput::make('link_form')
                ->label('Link Form')
                ->url()
                ->nullable(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pdf')->label('File PDF')->limit(30),
                Tables\Columns\TextColumn::make('link_pdf')->label('Link PDF')->limit(30),
                Tables\Columns\TextColumn::make('link_form')->label('Link Form')->limit(30),
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
            'index' => Pages\ListWorkshopAbs::route('/'),
            'create' => Pages\CreateWorkshopAb::route('/create'),
            'edit' => Pages\EditWorkshopAb::route('/{record}/edit'),
        ];
    }
}
