@extends('filament.pages.menu.layouts.app')

@section('title', 'Cadastro de Usuários')

@push('styles')
    <link href="{{ asset('vendor/tailwindcss/css/tailwind-build.css') }}" rel="stylesheet"/>
    <link href="{{ asset('vendor/tailwindcss/css/tailwind.min.css') }}" rel="stylesheet"/>
@endpush

@section('content')
    <div class="flex flex-col items-center justify-center mx-auto w-full max-w-5xl space-y-8 px-4 py-10">
        
        {{-- Logo centralizada --}}
        <div class="w-full flex justify-center">
            <img src="{{ asset('images/knapp_logo.svg') }}" alt="Logo da empresa" class="h-16 mb-6">
        </div>

        {{-- Título da Página --}}
        <h2 class="text-3xl font-extrabold leading-tight tracking-tight text-gray-900 dark:text-white text-center">
            Painel de Cadastro de Usuários
        </h2>

        {{-- Formulário de Cadastro --}}
        <section class="rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 shadow-sm w-full">
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
                            bg-blue-600 text-white
                            px-6 py-2.5 text-sm font-semibold shadow-sm
                            hover:bg-blue-700
                            focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                            Registrar Usuário
                        </button>
                    </div>
                </form>

                {{-- Mensagem de Sucesso --}}
                @if (session('success'))
                    <div class="bg-green-100 text-green-800 px-4 py-3 rounded mt-5">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </section>
    </div>
@endsection
