<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class AdminDashboard extends Page
{
    protected static ?string $title = 'MAIS User Management Portal';

    protected static ?string $navigationLabel = 'Dashboard';

    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static ?int $navigationSort = 1;

    protected static string $view = 'filament.pages.dashboard.admin-dashboard';

    public function canAccessPanel(?Authenticatable $user): bool
    {
        return $user?->hasRole('admin');
    }
}
