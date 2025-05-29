<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class CompaniesRegister extends Page
{
    protected static ?string $title = 'Cadastro de Empresas';

    protected static ?string $navigationLabel = 'Cadastro de Empresas';

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    protected static ?string $navigationGroup = 'Empresa';

    protected static ?int $navigationSort = 1;

    protected static string $view = 'filament.pages.registro-empresas.companies-register';

    public function canAccessPanel(?Authenticatable $user): bool
    {
        return $user?->hasRole('admin');
    }
}
