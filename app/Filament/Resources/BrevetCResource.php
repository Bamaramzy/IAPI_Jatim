<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BrevetCResource\Pages;
use App\Models\BrevetC;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;

class BrevetCResource extends Resource
{
    protected static ?string $model = BrevetC::class;
    protected static ?string $navigationIcon = 'heroicon-o-clipboard';
    protected static ?string $navigationGroup = 'Pelatihan';
    protected static ?string $navigationLabel = 'Brevet C';
    protected static ?string $slug = 'brevets-c';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('judul')
                ->label('Judul')
                ->required(),

            Forms\Components\FileUpload::make('brosur')
                ->directory('brevets_c')
                ->label('Brosur (PDF/Image)')
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
            'index' => Pages\ListBrevetCs::route('/'),
            'create' => Pages\CreateBrevetC::route('/create'),
            'edit' => Pages\EditBrevetC::route('/{record}/edit'),
        ];
    }
}
