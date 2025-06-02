@extends('filament.pages.menu.layouts.app')

@section('title', 'MAIS User Management Portal')

@push('styles')
    <link href="{{ asset('vendor/tailwindcss/css/tailwind-build.css') }}" rel="stylesheet"/>
    <link href="{{ asset('vendor/tailwindcss/css/tailwind.min.css') }}" rel="stylesheet"/>
@endpush

@section('content')
    <div class="mx-auto w-full max-w-5xl space-y-8 px-4 py-10">
        {{-- Título da Página --}}
        <h2 class="text-3xl font-extrabold leading-tight tracking-tight text-gray-900 dark:text-white">
            MAIS User Management Portal
        </h2>

        {{-- Painel de Indicadores --}}
        <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            {{-- Card: Total de Usuários --}}
            <div class="rounded-xl border border-green-400 bg-green-50 dark:bg-green-900/20 p-5 shadow-sm">
                <div class="flex items-center justify-between">
                    <div class="text-sm font-medium text-green-700 dark:text-green-300">
                        Usuários Ativos
                    </div>
                    <div class="rounded-full bg-green-500 text-white px-3 py-1 text-xs font-semibold">
                        {{ $this->usuariosAtivos }}
                    </div>
                </div>
                <p class="mt-2 text-xs text-green-600 dark:text-green-200">
                    Total de usuários com acesso ao sistema.
                </p>
            </div>

            {{-- Card: Total de Empresas --}}
            <div class="rounded-xl border border-yellow-400 bg-yellow-50 dark:bg-yellow-900/20 p-5 shadow-sm">
                <div class="flex items-center justify-between">
                    <div class="text-sm font-medium text-yellow-700 dark:text-yellow-300">
                        Empresas Ativas
                    </div>
                    <div class="rounded-full bg-yellow-500 text-white px-3 py-1 text-xs font-semibold">
                        {{ $this->empresasAtivas }}
                    </div>
                </div>
                <p class="mt-2 text-xs text-yellow-600 dark:text-yellow-200">
                    Empresas ativas no sistema.
                </p>
            </div>

            {{-- Card: Logs registrados --}}
            <div class="rounded-xl border border-gray-400 bg-gray-50 dark:bg-gray-800/20 p-5 shadow-sm">
                <div class="flex items-center justify-between">
                    <div class="text-sm font-medium text-gray-800 dark:text-gray-300">
                        Logs de Requisições
                    </div>
                    <div class="rounded-full bg-gray-500 text-white px-3 py-1 text-xs font-semibold">
                        {{ $this->logsRegistrados }}
                    </div>
                </div>
                <p class="mt-2 text-xs text-gray-600 dark:text-gray-200">
                    Ações monitoradas registradas no sistema.
                </p>
            </div>
        </section>

        {{-- Última atualização --}}
        <div class="text-xs text-right text-gray-500 dark:text-gray-400">
            Última atualização: {{ now()->format('d/m/Y H:i:s') }}
        </div>
    </div>
@endsection
