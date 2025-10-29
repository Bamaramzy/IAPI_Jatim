<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BrevetKuasaResource\Pages;
use App\Models\BrevetKuasa;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;

class BrevetKuasaResource extends Resource
{
    protected static ?string $model = BrevetKuasa::class;
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document';
    protected static ?string $navigationGroup = 'Pelatihan';
    protected static ?string $navigationLabel = 'Brevet Kuasa';
    protected static ?string $slug = 'brevets-kuasa';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('judul')
                ->label('Judul')
                ->required(),

            Forms\Components\FileUpload::make('brosur')
                ->directory('brevets_kuasa')
                ->label('Brosur (PDF/Image)')
                ->nullable(),

            Forms\Components\TextInput::make('link_daftar')
                ->label('Link Pendaftaran')
                ->url()
                ->nullable(),

            Forms\Components\Select::make('status')
                ->label('Status')
                ->options([
                    'publish' => 'Publish',
                    'draft' => 'Draft',
                ])
                ->default('draft')
                ->required(),
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
                    ->formatStateUsing(fn(?string $state): string => ucfirst($state))
                    ->colors([
                        'success' => 'publish',
                        'secondary' => 'draft',
                    ])
                    ->label('Status'),
            ])
            ->defaultSort('created_at', 'desc')

            // ✅ Tambahkan tombol aksi di sini juga
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])

            // ✅ Tambahkan bulk delete
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBrevetKuasas::route('/'),
            'create' => Pages\CreateBrevetKuasa::route('/create'),
            'edit' => Pages\EditBrevetKuasa::route('/{record}/edit'),
        ];
    }
}
