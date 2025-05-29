<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class UserRegister extends Page
{
    protected static ?string $title = 'Cadastro de Usuários';

    protected static ?string $navigationLabel = 'Cadastro de Usuários';

    protected static ?string $navigationIcon = 'heroicon-o-user-plus';

    protected static ?string $navigationGroup = 'Usuário';

    protected static ?int $navigationSort = 2;

    protected static string $view = 'filament.pages.registro-usuarios.register-user';

    public function canAccessPanel(?Authenticatable $user): bool
    {
        return $user?->hasRole('admin', 'gerente');
    }
}
