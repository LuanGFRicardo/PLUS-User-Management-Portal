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

            // Se o usuário foi reprovado, redireciona para a tela de acesso negado
            if (!is_null($user->data_reprovacao)) {
                Auth::logout();
                session()->invalidate();
                session()->regenerateToken();

                redirect('users/access/declined')->send();
                exit;
            }

            // Se o usuário ainda não foi aprovado, redireciona para a tela de aprovação pendente
            if (is_null($user->data_aprovacao)) {
                Auth::logout();
                session()->invalidate();
                session()->regenerateToken();

                redirect('users/access/pending')->send();
                exit;
            }
        });
    }
}
