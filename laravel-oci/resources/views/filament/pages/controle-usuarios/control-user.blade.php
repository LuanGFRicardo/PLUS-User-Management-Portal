@extends('filament.pages.menu.layouts.app')

@section('title', 'Dashboard de Aprovações')

@push('styles')
    <link href="{{ asset('vendor/tailwindcss/css/tailwind-build.css') }}" rel="stylesheet"/>
    <link href="{{ asset('vendor/tailwindcss/css/tailwind.min.css') }}" rel="stylesheet"/>
@endpush

@section('content')
    <div class="mx-auto w-full max-w-6xl space-y-8 px-4 py-10">
        {{-- Título --}}
        <h2 class="text-3xl font-extrabold leading-tight tracking-tight text-gray-900 dark:text-white">
            Painel de Aprovação de Usuários
        </h2>

        {{-- Indicadores de Status --}}
        <section class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            <div class="rounded-xl border border-yellow-400 bg-yellow-50 dark:bg-yellow-900/20 p-5 shadow-sm">
                <div class="flex items-center justify-between">
                    <div class="text-sm font-medium text-yellow-700 dark:text-yellow-300">
                        Aguardando Aprovação
                    </div>
                    <div class="rounded-full bg-yellow-400 text-white px-3 py-1 text-xs font-semibold">
                        {{ $aguardando }}
                    </div>
                </div>
                <p class="mt-2 text-xs text-yellow-600 dark:text-yellow-200">
                    Novos usuários aguardando decisão do administrador.
                </p>
            </div>

            <div class="rounded-xl border border-green-400 bg-green-50 dark:bg-green-900/20 p-5 shadow-sm">
                <div class="flex items-center justify-between">
                    <div class="text-sm font-medium text-green-700 dark:text-green-300">
                        Aprovados
                    </div>
                    <div class="rounded-full bg-green-500 text-white px-3 py-1 text-xs font-semibold">
                        {{ $aprovados }}
                    </div>
                </div>
                <p class="mt-2 text-xs text-green-600 dark:text-green-200">
                    Usuários aprovados recentemente.
                </p>
            </div>

            <div class="rounded-xl border border-red-400 bg-red-50 dark:bg-red-900/20 p-5 shadow-sm">
                <div class="flex items-center justify-between">
                    <div class="text-sm font-medium text-red-700 dark:text-red-300">
                        Reprovados
                    </div>
                    <div class="rounded-full bg-red-500 text-white px-3 py-1 text-xs font-semibold">
                        {{ $reprovados }}
                    </div>
                </div>
                <p class="mt-2 text-xs text-red-600 dark:text-red-200">
                    Solicitações recusadas manualmente.
                </p>
            </div>
        </section>

        {{-- Lista de Usuários Pendentes --}}
        <section class="rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 shadow-sm">
            <header class="rounded-t-xl border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 px-5 py-3">
                <h2 class="text-base font-semibold text-gray-800 dark:text-white">
                    Aprovação de Usuários Pendentes
                </h2>
            </header>
            <div class="px-5 py-6 overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-100 dark:bg-gray-800">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase">Nome</th>
                            <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase">Email</th>
                            <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase">Data de Cadastro</th>
                            <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-800">
                        @forelse($pendentes as $usuario)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/40">
                                <td class="px-4 py-2 text-sm text-gray-800 dark:text-white">
                                    {{ $usuario->name }}
                                </td>
                                <td class="px-4 py-2 text-sm text-gray-600 dark:text-gray-300">
                                    {{ $usuario->email }}
                                </td>
                                <td class="px-4 py-2 text-sm text-gray-600 dark:text-gray-400">
                                    {{ $usuario->created_at ? $usuario->created_at->format('d/m/Y') : '-' }}
                                </td>
                                <td class="px-4 py-2 space-x-2">
                                    <form method="POST" action="{{ route('users.approve', $usuario->id) }}" class="inline">
                                        @csrf
                                        <button class="px-3 py-1 text-xs font-semibold text-white bg-green-600 rounded hover:bg-green-700 transition">
                                            Aprovar
                                        </button>
                                    </form>

                                    <form method="POST" action="{{ route('users.reject', $usuario->id) }}" class="inline">
                                        @csrf
                                        <button class="px-3 py-1 text-xs font-semibold text-white bg-red-600 rounded hover:bg-red-700 transition">
                                            Reprovar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-4 py-2 text-sm text-gray-600 dark:text-gray-300">
                                    Nenhum usuário pendente no momento.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </div>
@endsection
