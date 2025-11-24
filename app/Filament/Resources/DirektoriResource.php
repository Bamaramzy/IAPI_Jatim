<?php

namespace App\Filament\Resources;

use App\Models\Direktori;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Filament\Resources\DirektoriResource\Pages;

class DirektoriResource extends Resource
{
    protected static ?string $model = Direktori::class;
    protected static ?string $navigationIcon = 'heroicon-o-archive-box';
    protected static ?string $navigationGroup = 'Keanggotaan';
    protected static ?string $navigationLabel = 'Direktori';
    protected static ?string $pluralLabel = 'Daftar Direktori';
    protected static ?string $slug = 'direktori';
    public static function getNavigationBadge(): ?string
    {
        return (string) Direktori::count();
    }
    public static function getNavigationBadgeColor(): ?string
    {
        return Direktori::count() > 0 ? 'success' : 'danger';
    }
    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('judul')
                ->required()
                ->maxLength(255),

            Forms\Components\Textarea::make('deskripsi')
                ->rows(3),

            Forms\Components\FileUpload::make('file_pdf')
                ->label('File PDF')
                ->directory('direktori')
                ->acceptedFileTypes(['application/pdf']),

            Forms\Components\TextInput::make('link_drive')
                ->label('Link Google Drive')
                ->placeholder('https://drive.google.com/file/d/.../view?usp=preview')
                ->url(),

            Forms\Components\FileUpload::make('cover')
                ->label('Gambar Sampul')
                ->directory('direktori/covers')
                ->image(),

            Forms\Components\Toggle::make('status')
                ->label('Publish?')
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
            'index' => Pages\ListDirektoris::route('/'),
            'create' => Pages\CreateDirektori::route('/create'),
            'edit' => Pages\EditDirektori::route('/{record}/edit'),
        ];
    }
}
