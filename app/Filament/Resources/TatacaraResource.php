<?php

namespace App\Filament\Resources;

use App\Models\Tatacara;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Filament\Resources\TatacaraResource\Pages;

class TatacaraResource extends Resource
{
    protected static ?string $model = Tatacara::class;
    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationGroup = 'Keanggotaan';
    protected static ?string $navigationLabel = 'Tata Cara';
    protected static ?string $pluralLabel = 'Daftar Tata Cara';
    protected static ?string $slug = 'tatacara';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('judul')
                ->required()
                ->maxLength(255),

            Forms\Components\FileUpload::make('file_pdf')
                ->label('File PDF')
                ->directory('tatacara')
                ->acceptedFileTypes(['application/pdf']),

            Forms\Components\TextInput::make('link_drive')
                ->label('Link Google Drive')
                ->url()
                ->placeholder('https://drive.google.com/file/d/.../view?usp=preview'),

            Forms\Components\FileUpload::make('cover')
                ->label('Gambar Sampul')
                ->directory('tatacara/covers')
                ->image(),

            Forms\Components\Toggle::make('status')
                ->label('Status Publikasi')
                ->onIcon('heroicon-o-check')
                ->offIcon('heroicon-o-x-mark')
                ->onColor('success')
                ->offColor('secondary')
                ->default(true)
                ->dehydrateStateUsing(fn(bool $state): string => $state ? 'aktif' : 'nonaktif')
                ->afterStateHydrated(
                    fn($component, $record) =>
                    $component->state($record?->status === 'aktif')
                ),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\ImageColumn::make('cover')
                    ->label('Cover'),

                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->formatStateUsing(fn(?string $state): string => match ($state) {
                        'aktif' => 'Publish',
                        'nonaktif' => 'Draft',
                        default => ucfirst((string) $state),
                    })
                    ->colors([
                        'success' => fn($state) => $state === 'aktif',
                        'secondary' => fn($state) => $state === 'nonaktif',
                    ]),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i'),
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
            'index' => Pages\ListTatacaras::route('/'),
            'create' => Pages\CreateTatacara::route('/create'),
            'edit' => Pages\EditTatacara::route('/{record}/edit'),
        ];
    }
}
