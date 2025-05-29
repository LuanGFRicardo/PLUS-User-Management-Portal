<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class LogManagement extends Page
{
    protected static ?string $title = 'Histórico de Logs';

    protected static ?string $navigationLabel = 'Histórico de Logs';

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationGroup = 'OCI';

    protected static ?int $navigationSort = 2;

    protected static string $view = 'filament.pages.gerenciamento-logs.log-management';

    public function canAccessPanel(?Authenticatable $user): bool
    {
        return $user?->hasRole('admin', 'gerente');
    }
}
