<?php

namespace App\Filament\Resources;

use App\Models\Anggota;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Filament\Resources\AnggotaResource\Pages;

class AnggotaResource extends Resource
{
    protected static ?string $model = Anggota::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Keanggotaan';
    protected static ?string $navigationLabel = 'Anggota';
    protected static ?string $pluralLabel = 'Daftar Anggota';
    protected static ?string $slug = 'anggota';
    public static function getNavigationBadge(): ?string
    {
        return (string) Anggota::count();
    }
    public static function getNavigationBadgeColor(): ?string
    {
        return Anggota::count() > 0 ? 'success' : 'danger';
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('no_urut')
                    ->numeric()
                    ->required(),

                Forms\Components\TextInput::make('no_reg_iapi')
                    ->label('No. Reg IAPI')
                    ->required(),

                Forms\Components\TextInput::make('nama_anggota')
                    ->required(),

                Forms\Components\TextInput::make('izin_ap')
                    ->label('Izin AP'),

                Forms\Components\TextInput::make('kategori')
                    ->required(),

                Forms\Components\TextInput::make('nama_kap')
                    ->label('Nama KAP'),

                Forms\Components\Select::make('status_id')
                    ->label('Status')
                    ->options([
                        'Aktif' => 'Aktif',
                        'Cuti Sementara' => 'Cuti Sementara',
                        'Tidak Aktif' => 'Tidak Aktif',
                    ])
                    ->default('Aktif')
                    ->required(),

                Forms\Components\TextInput::make('korwil')
                    ->label('Korwil'),

                Forms\Components\TextInput::make('terdaftar_pada')
                    ->label('Terdaftar Pada')
                    ->maxLength(100)
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('no_urut')->sortable(),
                Tables\Columns\TextColumn::make('no_reg_iapi')->label('No Reg IAPI')->searchable(),
                Tables\Columns\TextColumn::make('nama_anggota')->searchable(),
                Tables\Columns\TextColumn::make('kategori')->sortable(),
                Tables\Columns\TextColumn::make('nama_kap')->label('Nama KAP')->searchable(),
                Tables\Columns\TextColumn::make('status_id')->label('Status')->sortable(),
                Tables\Columns\TextColumn::make('korwil')->sortable(),
                Tables\Columns\TextColumn::make('terdaftar_pada')->label('Terdaftar Pada')->searchable()->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('kategori')
                    ->options(Anggota::select('kategori')->distinct()->pluck('kategori', 'kategori')->toArray()),
                Tables\Filters\SelectFilter::make('terdaftar_pada')->label('Terdaftar Pada'),
                Tables\Filters\SelectFilter::make('status_id')
                    ->label('Status')
                    ->options([
                        'Aktif' => 'Aktif',
                        'Cuti Sementara' => 'Cuti Sementara',
                        'Tidak Aktif' => 'Tidak Aktif',
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
            'index' => Pages\ListAnggotas::route('/'),
            'create' => Pages\CreateAnggota::route('/create'),
            'edit' => Pages\EditAnggota::route('/{record}/edit'),
        ];
    }
}
