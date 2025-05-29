@extends('filament.pages.menu.layouts.app')

@section('title', 'Gestão de Empresas')

@push('styles')
    <link href="{{ asset('vendor/tailwindcss/css/tailwind-build.css') }}" rel="stylesheet"/>
    <link href="{{ asset('vendor/tailwindcss/css/tailwind.min.css') }}" rel="stylesheet"/>
@endpush

@section('content')
    <div class="mx-auto w-full max-w-6xl space-y-8 px-4 py-10">
        {{-- Título --}}
        <h2 class="text-3xl font-extrabold leading-tight tracking-tight text-gray-900 dark:text-white">
            Painel de Gestão de Empresas
        </h2>

        {{-- Indicadores de Status --}}
        <section class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            <div class="rounded-xl border border-green-400 bg-green-50 dark:bg-green-900/20 p-5 shadow-sm">
                <div class="flex items-center justify-between">
                    <div class="text-sm font-medium text-green-700 dark:text-green-300">
                        Empresas Ativas
                    </div>
                    <div class="rounded-full bg-green-500 text-white px-3 py-1 text-xs font-semibold">
                        8
                    </div>
                </div>
                <p class="mt-2 text-xs text-green-600 dark:text-green-200">
                    Empresas atualmente operando no sistema.
                </p>
            </div>

            <div class="rounded-xl border border-red-400 bg-red-50 dark:bg-red-900/20 p-5 shadow-sm">
                <div class="flex items-center justify-between">
                    <div class="text-sm font-medium text-red-700 dark:text-red-300">
                        Empresas Inativas
                    </div>
                    <div class="rounded-full bg-red-500 text-white px-3 py-1 text-xs font-semibold">
                        3
                    </div>
                </div>
                <p class="mt-2 text-xs text-red-600 dark:text-red-200">
                    Empresas desativadas ou pendentes de regularização.
                </p>
            </div>
        </section>

        {{-- Lista de Empresas --}}
        <section class="rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 shadow-sm">
            <header class="rounded-t-xl border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 px-5 py-3">
                <h2 class="text-base font-semibold text-gray-800 dark:text-white">
                    Empresas Cadastradas
                </h2>
            </header>
            <div class="px-5 py-6 overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-100 dark:bg-gray-800">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase">Razão Social</th>
                            <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase">CNPJ</th>
                            <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase">Status</th>
                            <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-800">
                        {{-- Empresa Exemplo 1 --}}
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/40">
                            <td class="px-4 py-2 text-sm text-gray-800 dark:text-white">ACME Indústrias S/A</td>
                            <td class="px-4 py-2 text-sm text-gray-600 dark:text-gray-300">12.345.678/0001-90</td>
                            <td class="px-4 py-2 text-sm">
                                <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded">
                                    Ativa
                                </span>
                            </td>
                            <td class="px-4 py-2 space-x-2">
                                <button class="px-3 py-1 text-xs font-semibold text-white bg-red-600 rounded hover:bg-red-700 transition">
                                    Desativar
                                </button>
                                <button class="px-3 py-1 text-xs font-semibold text-white bg-blue-600 rounded hover:bg-blue-700 transition">
                                    Editar
                                </button>
                            </td>
                        </tr>

                        {{-- Empresa Exemplo 2 --}}
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/40">
                            <td class="px-4 py-2 text-sm text-gray-800 dark:text-white">Translog Express Ltda</td>
                            <td class="px-4 py-2 text-sm text-gray-600 dark:text-gray-300">98.765.432/0001-00</td>
                            <td class="px-4 py-2 text-sm">
                                <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-red-100 text-red-800 rounded">
                                    Inativa
                                </span>
                            </td>
                            <td class="px-4 py-2 space-x-2">
                                <button class="px-3 py-1 text-xs font-semibold text-white bg-green-600 rounded hover:bg-green-700 transition">
                                    Ativar
                                </button>
                                <button class="px-3 py-1 text-xs font-semibold text-white bg-blue-600 rounded hover:bg-blue-700 transition">
                                    Editar
                                </button>
                            </td>
                        </tr>

                        {{-- Empresa Exemplo 3 --}}
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/40">
                            <td class="px-4 py-2 text-sm text-gray-800 dark:text-white">InovaTech Soluções ME</td>
                            <td class="px-4 py-2 text-sm text-gray-600 dark:text-gray-300">11.111.222/0001-33</td>
                            <td class="px-4 py-2 text-sm">
                                <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded">
                                    Ativa
                                </span>
                            </td>
                            <td class="px-4 py-2 space-x-2">
                                <button class="px-3 py-1 text-xs font-semibold text-white bg-green-600 rounded hover:bg-green-700 transition">
                                    Ativar
                                </button>
                                <button class="px-3 py-1 text-xs font-semibold text-white bg-blue-600 rounded hover:bg-blue-700 transition">
                                    Editar
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
@endsection
