<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class CompaniesManagement extends Page
{
    protected static ?string $title = 'Gestão de Empresas';

    protected static ?string $navigationLabel = 'Gestão de Empresas';

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.gestao-empresas.manage-companies';
}
