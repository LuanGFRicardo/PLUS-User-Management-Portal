<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function showRegistrationForm()
    {
        $pendingUsersCount = User::where('aprovacao', User::APROVACAO_PENDENTE)->count();

        return view('filament.pages.registro-usuarios.register-user', compact('pendingUsersCount'));
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'fullName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $validated['fullName'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'aprovacao' => User::APROVACAO_PENDENTE,
        ]);

        return redirect()->route('registration.confirmed')
            ->with('success', 'Usuário cadastrado com sucesso. Aguarde aprovação.');
    }
}
