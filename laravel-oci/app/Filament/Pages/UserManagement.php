<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class UserManagement extends Page
{
    protected static ?string $title = 'Aprovação de Usuários';

    protected static ?string $navigationLabel = 'Aprovação de Usuários';

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Usuário';

    protected static ?int $navigationSort = 1;

    protected static string $view = 'filament.pages.controle-usuarios.control-user';

    public function canAccessPanel(?Authenticatable $user): bool
    {
        return $user?->hasRole('admin', 'gerente');
    }
}
