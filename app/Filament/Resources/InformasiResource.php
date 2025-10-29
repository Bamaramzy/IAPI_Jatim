<?php

namespace App\Filament\Resources;

use App\Models\Informasi;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Filament\Resources\InformasiResource\Pages;

class InformasiResource extends Resource
{
    protected static ?string $model = Informasi::class;
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationGroup = 'Beranda';
    protected static ?string $navigationLabel = 'Informasi';
    protected static ?string $pluralLabel = 'Daftar Informasi';
    protected static ?string $slug = 'informasi';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('judul')
                ->label('Judul')
                ->required()
                ->maxLength(255),

            // ✅ FileUpload dengan preview aktif & disk public
            Forms\Components\FileUpload::make('gambar')
                ->label('Gambar')
                ->image()
                ->imagePreviewHeight('250') // tampilkan preview besar
                ->directory('informasi/gambar')
                ->disk('public') // wajib agar URL tampil
                ->visibility('public')
                ->required(),

            Forms\Components\TextInput::make('link')
                ->label('Tautan (Opsional)')
                ->url()
                ->nullable(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('judul')
                ->label('Judul')
                ->searchable()
                ->sortable(),

            // ✅ Pastikan disk diset agar URL gambar tampil
            Tables\Columns\ImageColumn::make('gambar')
                ->label('Gambar')
                ->disk('public')
                ->square()
                ->height(60)
                ->width(60),

            Tables\Columns\TextColumn::make('link')
                ->label('Tautan')
                ->limit(50)
                ->url(fn($record) => $record->link, true)
                ->openUrlInNewTab(),
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
            'index' => Pages\ListInformasis::route('/'),
            'create' => Pages\CreateInformasi::route('/create'),
            'edit' => Pages\EditInformasi::route('/{record}/edit'),
        ];
    }
}
