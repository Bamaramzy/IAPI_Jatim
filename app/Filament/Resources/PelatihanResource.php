<?php

namespace App\Filament\Resources;

use App\Models\Pelatihan;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Filament\Resources\PelatihanResource\Pages;

class PelatihanResource extends Resource
{
    protected static ?string $model = Pelatihan::class;
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationGroup = 'Pelatihan';
    protected static ?string $navigationLabel = 'Jadwal Pelatihan';
    protected static ?string $pluralLabel = 'Daftar Pelatihan';
    protected static ?string $slug = 'pelatihan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->label('Judul Pelatihan'),

                Forms\Components\Select::make('kategori')
                    ->label('Kategori')
                    ->options([
                        'Tatap Muka' => 'Tatap Muka',
                        'Webinar' => 'Webinar',
                        'Hybrid' => 'Hybrid',
                    ])
                    ->required(),

                Forms\Components\DatePicker::make('tanggal_mulai')
                    ->label('Tanggal Mulai')
                    ->required(),

                Forms\Components\DatePicker::make('tanggal_selesai')
                    ->label('Tanggal Selesai')
                    ->required(),

                Forms\Components\TimePicker::make('waktu_mulai')
                    ->label('Waktu Mulai'),

                Forms\Components\TimePicker::make('waktu_selesai')
                    ->label('Waktu Selesai'),

                Forms\Components\TextInput::make('lokasi')
                    ->required(),

                Forms\Components\FileUpload::make('brosur')
                    ->label('Upload Brosur')
                    ->directory('pelatihan/brosur'),

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

                Tables\Columns\TextColumn::make('kategori')
                    ->label('Kategori')
                    ->badge()
                    ->colors([
                        'info' => 'Webinar',
                        'success' => 'Tatap Muka',
                        'warning' => 'Hybrid',
                    ]),

                Tables\Columns\TextColumn::make('tanggal_mulai')
                    ->date()
                    ->label('Mulai'),

                Tables\Columns\TextColumn::make('tanggal_selesai')
                    ->date()
                    ->label('Selesai'),

                Tables\Columns\TextColumn::make('lokasi')
                    ->limit(20),

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
            'index' => Pages\ListPelatihans::route('/'),
            'create' => Pages\CreatePelatihan::route('/create'),
            'edit' => Pages\EditPelatihan::route('/{record}/edit'),
        ];
    }
}
