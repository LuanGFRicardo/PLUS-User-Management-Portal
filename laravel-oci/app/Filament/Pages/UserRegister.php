<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class UserRegister extends Page
{
    protected static ?string $title = 'Cadastro de Usuários';

    protected static ?string $navigationLabel = 'Cadastro de Usuários';

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.registro-usuarios.register-user';
}
