<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Filament::serving(function () {
            // Permitir livre acesso à tela de login do Filament
            if (Request::is('admin/login')) {
                return;
            }

            $user = Auth::user();

            if (! $user) {
                return;
            }

            // Bloqueia e desloga se usuário não tiver role ou não tiver sido aprovado
            if (
                $user->roles->isEmpty() ||
                is_null($user->data_aprovacao)
            ) {
                Auth::logout();
                session()->invalidate();
                session()->regenerateToken();

                redirect('users/access/pending')->send();
                exit;
            }
        });
    }
}
