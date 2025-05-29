<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Pages\Page;
use Illuminate\Contracts\Auth\Authenticatable;

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

    /**
     * Dados que serão passados para a view.
     *
     * @return array
     */
    protected function getViewData(): array
    {
        return [
            'aguardando' => User::whereNull('aprovacao')->count(),
            'aprovados' => User::where('aprovacao', true)->count(),
            'reprovados' => User::where('aprovacao', false)->count(),
            'pendentes' => User::whereNull('aprovacao')->get(),
        ];
    }
}
