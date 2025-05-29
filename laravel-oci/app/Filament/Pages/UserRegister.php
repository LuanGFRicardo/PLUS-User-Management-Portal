<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Pages\Page;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserRegister extends Page
{
    protected static ?string $title = 'Cadastro de Usuários';
    protected static ?string $navigationLabel = 'Cadastro de Usuários';
    protected static ?string $navigationIcon = 'heroicon-o-user-plus';
    protected static ?string $navigationGroup = 'Usuário';
    protected static ?int $navigationSort = 2;

    protected static string $view = 'filament.pages.registro-usuarios.register-user';

    public $fullName;
    public $email;
    public $password;

    public function canAccessPanel(?Authenticatable $user): bool
    {
        return $user?->hasRole('admin', 'gerente');
    }

    // Regras de validação para o formulário
    protected function rules(): array
    {
        return [
            'fullName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
        ];
    }

    // Método para criar usuário — será acionado via Livewire (submit do form)
    public function registerUser()
    {
        $this->validate();

        User::create([
            'name' => $this->fullName,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'aprovacao' => null, // aguardando aprovação
        ]);

        // Resetar campos do form
        $this->reset(['fullName', 'email', 'password']);

        // Feedback para o usuário
        session()->flash('success', 'Usuário cadastrado com sucesso. Aguarde aprovação.');

        // Atualizar dados da página (recarregar view)
        $this->redirect(request()->header('Referer'));
    }

    protected function getViewData(): array
    {
        return [
            'pendingUsersCount' => User::whereNull('aprovacao')->count(),
        ];
    }
}
