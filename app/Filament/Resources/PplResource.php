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
    public static function getNavigationBadge(): ?string
    {
        return (string) Ppl::count();
    }
    public static function getNavigationBadgeColor(): ?string
    {
        return Ppl::count() > 0 ? 'success' : 'danger';
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('video_url')
                    ->label('URL Video (YouTube / Drive)')
                    ->url()
                    ->nullable()
                    ->maxLength(255)
                    ->placeholder('https://www.youtube.com/...'),

                Forms\Components\TextInput::make('pdf_url')
                    ->label('URL PDF (Google Drive / lainnya)')
                    ->url()
                    ->nullable()
                    ->placeholder('https://drive.google.com/file/d/.../view?usp=preview'),

                Forms\Components\Toggle::make('status')
                    ->label('Publish?')
                    ->onIcon('heroicon-o-check')
                    ->offIcon('heroicon-o-x-mark')
                    ->onColor('success')
                    ->offColor('secondary')
                    ->default(true)
                    ->dehydrateStateUsing(fn(bool $state): string => $state ? 'publish' : 'draft')
                    ->afterStateHydrated(
                        fn($component, $record) =>
                        $component->state($record?->status === 'publish')
                    ),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('video_url')
                    ->label('Video URL')
                    ->limit(40)
                    ->searchable(),

                Tables\Columns\TextColumn::make('pdf_url')
                    ->label('PDF URL')
                    ->limit(40)
                    ->searchable(),

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
            ])
            ->filters([])
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
