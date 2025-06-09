<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\User;
use App\Models\Empresa;
use App\Models\Log;
use Illuminate\Contracts\Auth\Authenticatable;

class AdminDashboard extends Page
{
    protected static ?string $title = 'PLUS User Management Portal';

    protected static ?string $navigationLabel = 'Dashboard';

    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static ?int $navigationSort = 1;

    protected static string $view = 'filament.pages.dashboard.admin-dashboard';

    public function canAccessPanel(?Authenticatable $user): bool
    {
        return $user?->hasRole('admin');
    }

    // Métodos para obter os dados dinâmicos
    public function getUsuariosAtivosProperty(): int
    {
        return User::where('aprovacao', User::APROVACAO_APROVADO)->count();
    }

    public function getEmpresasAtivasProperty(): int
    {
        return Empresa::where('ativo', true)->count();
    }

    public function getLogsRegistradosProperty(): int
    {
        return Log::count();
    }
}
