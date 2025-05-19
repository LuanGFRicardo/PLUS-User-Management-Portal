<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class LogManagement extends Page
{
    protected static ?string $title = 'Histórico de Logs';

    protected static ?string $navigationLabel = 'Histórico de Logs';

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static string $view = 'filament.pages.gerenciamento-logs.log-management';
}
