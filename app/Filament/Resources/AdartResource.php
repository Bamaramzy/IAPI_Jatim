<?php

namespace App\Filament\Resources;

use App\Models\Adart;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Filament\Resources\AdartResource\Pages;

class AdartResource extends Resource
{
    protected static ?string $model = Adart::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Keanggotaan';
    protected static ?string $navigationLabel = 'AD/ART';
    protected static ?string $pluralLabel = 'Daftar AD/ART';
    protected static ?string $slug = 'adart';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('judul')
                ->required()
                ->maxLength(255),

            Forms\Components\FileUpload::make('file_pdf')
                ->label('File PDF')
                ->directory('adart')
                ->acceptedFileTypes(['application/pdf'])
                ->helperText('Unggah file PDF lokal atau isi link Google Drive di bawah.'),

            Forms\Components\TextInput::make('link_drive')
                ->label('Link Google Drive')
                ->placeholder('https://drive.google.com/file/d/.../view?usp=preview')
                ->url(),

            Forms\Components\FileUpload::make('cover')
                ->label('Gambar Sampul')
                ->directory('adart/covers')
                ->image(),

            Forms\Components\Toggle::make('status')
                ->label('Publish?')
                ->onIcon('heroicon-o-check')
                ->offIcon('heroicon-o-x-mark')
                ->default(true)
                ->dehydrateStateUsing(fn(bool $state): string => $state ? 'publish' : 'draft')
                ->afterStateHydrated(
                    fn($component, $record) =>
                    $component->state($record?->status === 'publish')
                ),

            Forms\Components\View::make('forms.preview-pdf')
                ->visible(fn($get) => filled($get('file_pdf')) || filled($get('link_drive'))),
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

                // 🔍 Preview PDF atau Link Drive
                Tables\Columns\ViewColumn::make('file_pdf')
                    ->label('Preview PDF / Link')
                    ->view('tables.columns.pdf-preview'),

                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->formatStateUsing(fn(?string $state): string => match ($state) {
                        'publish' => 'Publish',
                        'draft' => 'Draft',
                        default => ucfirst((string) $state),
                    })
                    ->colors([
                        'success' => 'publish',
                        'secondary' => 'draft',
                    ]),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Dibuat'),
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
            'index' => Pages\ListAdarts::route('/'),
            'create' => Pages\CreateAdart::route('/create'),
            'edit' => Pages\EditAdart::route('/{record}/edit'),
        ];
    }
}
