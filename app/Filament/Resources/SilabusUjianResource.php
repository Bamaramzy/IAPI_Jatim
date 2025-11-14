<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SilabusUjianResource\Pages;
use App\Models\Silabus;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;

class SilabusUjianResource extends Resource
{
    protected static ?string $model = Silabus::class;
    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationGroup = 'Sertifikasi';
    protected static ?string $navigationLabel = 'Silabus Ujian';
    protected static ?string $slug = 'silabus-ujian';
    public static function getNavigationBadge(): ?string
    {
        return (string) Silabus::count();
    }
    public static function getNavigationBadgeColor(): ?string
    {
        return Silabus::count() > 0 ? 'success' : 'danger';
    }
    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('kategori_utama')->required(),
            Forms\Components\TextInput::make('sub_kategori')->nullable(),
            Forms\Components\TextInput::make('judul')->required(),
            Forms\Components\Textarea::make('deskripsi')->rows(3)->nullable(),

            Forms\Components\FileUpload::make('pdf_file')
                ->label('File PDF')
                ->directory('uploads/silabus/pdf')
                ->acceptedFileTypes(['application/pdf'])
                ->nullable(),

            Forms\Components\TextInput::make('pdf_link')
                ->label('Link Google Drive')
                ->url()
                ->nullable()
                ->placeholder('https://drive.google.com/file/d/.../view?usp=preview'),

            Forms\Components\FileUpload::make('gambar')
                ->label('Gambar')
                ->directory('uploads/silabus/gambar')
                ->image()
                ->nullable(),

            Forms\Components\TextInput::make('gambar_link')->label('Link Gambar')->url()->nullable(),
            Forms\Components\TextInput::make('ilustrasi_link')->label('Link Ilustrasi Soal')->url()->nullable(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kategori_utama'),
                Tables\Columns\TextColumn::make('sub_kategori'),
                Tables\Columns\TextColumn::make('judul')->searchable(),
                Tables\Columns\ImageColumn::make('gambar')->label('Gambar'),
                Tables\Columns\TextColumn::make('created_at')->label('Dibuat')->dateTime('d M Y'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSilabusUjians::route('/'),
            'create' => Pages\CreateSilabusUjian::route('/create'),
            'edit' => Pages\EditSilabusUjian::route('/{record}/edit'),
        ];
    }
}
