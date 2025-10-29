<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class DashboardAdmin extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $title = 'Dashboard Admin IAPI Jatim';
    protected static ?string $navigationLabel = 'Dashboard';
    protected static ?int $navigationSort = 1;
    protected static string $view = 'filament.pages.dashboard-admin';

    // HAPUS method getSlug() yang mengembalikan '/'
    // Karena menyebabkan 404 pada Filament v3.

    // Tambahkan slug default agar route valid
    public static function getSlug(): string
    {
        return 'dashboard-admin';
    }
}
