<?php

namespace App\Filament\Resources;

use App\Models\Ppl;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Filament\Resources\PplResource\Pages;

class PplResource extends Resource
{
    protected static ?string $model = Ppl::class;
    protected static ?string $navigationIcon = 'heroicon-o-video-camera';
    protected static ?string $navigationGroup = 'Pelatihan';
    protected static ?string $navigationLabel = 'PPL';
    protected static ?string $pluralLabel = 'Daftar PPL';
    protected static ?string $slug = 'ppl';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('video_url')
                    ->label('URL Video')
                    ->url()
                    ->required(),

                Forms\Components\FileUpload::make('pdf_url')
                    ->label('Materi PDF')
                    ->directory('ppl/pdf'),

                Forms\Components\Select::make('status')
                    ->options([
                        'Aktif' => 'publish',
                        'Tidak Aktif' => 'draft',
                    ])
                    ->default('Aktif')
                    ->label('Status'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('video_url')
                    ->label('Video')
                    ->limit(40),
                Tables\Columns\TextColumn::make('pdf_url')
                    ->label('PDF')
                    ->limit(40),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'success' => 'publish',
                        'danger' => 'draft',
                    ]),
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
            'index' => Pages\ListPpls::route('/'),
            'create' => Pages\CreatePpl::route('/create'),
            'edit' => Pages\EditPpl::route('/{record}/edit'),
        ];
    }
}
