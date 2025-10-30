<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JalurRegulerResource\Pages;
use App\Models\JalurReguler;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Form;

class JalurRegulerResource extends Resource
{
    protected static ?string $model = JalurReguler::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document';
    protected static ?string $navigationGroup = 'Sertifikasi';
    protected static ?string $navigationLabel = 'Jalur Reguler';
    protected static ?string $slug = 'jalur-reguler';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('kategori')
                ->label('Kategori')
                ->options([
                    'Informasi Umum' => 'Informasi Umum',
                    'Tingkat Dasar' => 'Tingkat Dasar',
                    'Tingkat Profesional' => 'Tingkat Profesional',
                    'Penilaian Pengalaman Audit' => 'Penilaian Pengalaman Audit',
                ])
                ->required(),

            Forms\Components\TextInput::make('judul')
                ->label('Judul')
                ->required(),

            Forms\Components\RichEditor::make('konten')
                ->label('Konten')
                ->required()
                ->toolbarButtons(['bold', 'italic', 'underline', 'link', 'bulletList', 'orderedList']),

            Forms\Components\FileUpload::make('file')
                ->label('File (opsional)')
                ->directory('uploads/jalur_reguler')
                ->acceptedFileTypes(['application/pdf']),

            Forms\Components\TextInput::make('link')
                ->label('Link')
                ->url()
                ->nullable(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kategori')->sortable(),
                Tables\Columns\TextColumn::make('judul')->searchable(),
                Tables\Columns\TextColumn::make('link')->limit(30),
                Tables\Columns\TextColumn::make('created_at')->label('Dibuat')->dateTime('d M Y'),
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
            'index' => Pages\ListJalurRegulers::route('/'),
            'create' => Pages\CreateJalurReguler::route('/create'),
            'edit' => Pages\EditJalurReguler::route('/{record}/edit'),
        ];
    }
}
