<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BrevetResource\Pages;
use App\Models\Brevet;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;

class BrevetResource extends Resource
{
    protected static ?string $model = Brevet::class;
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationGroup = 'Pelatihan';
    protected static ?string $navigationLabel = 'Brevet A & B';
    protected static ?string $slug = 'brevets';
    public static function getNavigationBadge(): ?string
    {
        return (string) Brevet::count();
    }
    public static function getNavigationBadgeColor(): ?string
    {
        return Brevet::count() > 0 ? 'success' : 'danger';
    }
    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('judul')
                ->label('Judul'),

            Forms\Components\FileUpload::make('brosur')
                ->label('Brosur (PDF/Image)')
                ->directory('brevets')
                ->nullable(),

            Forms\Components\TextInput::make('link_daftar')
                ->label('Link Pendaftaran')
                ->url()
                ->nullable(),

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
                Tables\Columns\TextColumn::make('judul')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\ImageColumn::make('brosur')
                    ->label('Brosur'),

                Tables\Columns\TextColumn::make('link_daftar')
                    ->limit(40)
                    ->label('Link Pendaftaran'),

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
            ->defaultSort('created_at', 'desc')

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
            'index' => Pages\ListBrevets::route('/'),
            'create' => Pages\CreateBrevet::route('/create'),
            'edit' => Pages\EditBrevet::route('/{record}/edit'),
        ];
    }
}
