<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class UserRegister extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.registro-usuarios.register-user';

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }
}
