@extends('filament.pages.menu.layouts.app')

@section('title', 'Cadastro de Usuários')

@push('styles')
    <link href="{{ asset('vendor/tailwindcss/css/tailwind-build.css') }}" rel="stylesheet"/>
    <link href="{{ asset('vendor/tailwindcss/css/tailwind.min.css') }}" rel="stylesheet"/>
@endpush

@section('content')
    <div class="mx-auto w-full max-w-5xl space-y-8 px-4 py-10">
        {{-- Título da Página --}}
        <h2 class="text-3xl font-extrabold leading-tight tracking-tight text-gray-900 dark:text-white">
            Painel de Cadastro de Usuários
        </h2>

        {{-- Painel de Indicadores (Dashboard) --}}
        <section class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            {{-- Card: Usuários Pendentes de Aprovação --}}
            <div class="rounded-xl border border-yellow-400 bg-yellow-50 dark:bg-yellow-900/20 p-5 shadow-sm">
                <div class="flex items-center justify-between">
                    <div class="text-sm font-medium text-yellow-700 dark:text-yellow-300">
                        Aguardando Aprovação
                    </div>
                    <div class="rounded-full bg-yellow-400 text-white px-3 py-1 text-xs font-semibold">
                        {{ $pendingUsersCount ?? 0 }}
                    </div>
                </div>
                <p class="mt-2 text-xs text-yellow-600 dark:text-yellow-200">
                    Usuários recém cadastrados aguardando aprovação do administrador.
                </p>
            </div>
        </section>

        {{-- Formulário de Cadastro --}}
        <section class="rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 shadow-sm">
            <header class="rounded-t-xl border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 px-5 py-3">
                <h2 class="text-base font-semibold text-gray-800 dark:text-white">
                    Cadastro de Usuário
                </h2>
            </header>
            <div class="px-5 py-6">
                <form method="POST" action="{{ route('users.register') }}" class="space-y-5">
                    @csrf

                    {{-- Nome Completo --}}
                    <div>
                        <label for="fullName" class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-1">
                            Nome Completo
                        </label>
                        <input
                            type="text"
                            id="fullName"
                            name="fullName"
                            class="filament-forms-input block w-full py-2 px-4 border border-gray-300 rounded-lg dark:border-gray-600 dark:bg-gray-900 dark:text-white shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 sm:text-sm"
                            placeholder="Digite seu nome completo"
                            value="{{ old('fullName') }}"
                            required>
                        @error('fullName') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                    </div>

                    {{-- E-mail --}}
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-1">
                            E-mail
                        </label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="filament-forms-input block w-full py-2 px-4 border border-gray-300 rounded-lg dark:border-gray-600 dark:bg-gray-900 dark:text-white shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 sm:text-sm"
                            placeholder="usuario@email.com"
                            value="{{ old('email') }}"
                            required>
                        @error('email') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                    </div>

                    {{-- Senha --}}
                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-1">
                            Senha
                        </label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="filament-forms-input block w-full py-2 px-4 border border-gray-300 rounded-lg dark:border-gray-600 dark:bg-gray-900 dark:text-white shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 sm:text-sm"
                            placeholder="••••••••"
                            required>
                        @error('password') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                    </div>

                    {{-- Confirmação de Senha --}}
                    <div>
                        <label for="password_confirmation" class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-1">
                            Confirmar Senha
                        </label>
                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            class="filament-forms-input block w-full py-2 px-4 border border-gray-300 rounded-lg dark:border-gray-600 dark:bg-gray-900 dark:text-white shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 sm:text-sm"
                            placeholder="••••••••"
                            required>
                        @error('password_confirmation') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                    </div>

                    {{-- Botão Registrar --}}
                    <div>
                        <button
                            type="submit"
                            class="inline-flex items-center justify-center rounded-md
                            bg-primary-600 text-white
                            px-6 py-2.5 text-sm font-semibold shadow-sm
                            hover:bg-primary-700
                            focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition">
                            Registrar Usuário
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
