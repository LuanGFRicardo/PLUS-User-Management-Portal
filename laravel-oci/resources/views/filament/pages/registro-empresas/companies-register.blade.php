@extends('filament.pages.menu.layouts.app')

@section('title', 'Cadastro de Empresas')

@push('styles')
    <link href="{{ asset('vendor/tailwindcss/css/tailwind-build.css') }}" rel="stylesheet"/>
    <link href="{{ asset('vendor/tailwindcss/css/tailwind.min.css') }}" rel="stylesheet"/>
@endpush

@section('content')
    <div class="mx-auto w-full max-w-5xl space-y-8 px-4 py-10">
        {{-- Título da Página --}}
        <h2 class="text-3xl font-extrabold leading-tight tracking-tight text-gray-900 dark:text-white">
            Painel de Cadastro de Empresas
        </h2>

        {{-- Formulário de Cadastro --}}
        <section class="rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 shadow-sm">
            <header class="rounded-t-xl border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 px-5 py-3">
                <h2 class="text-base font-semibold text-gray-800 dark:text-white">
                    Cadastro de Empresa
                </h2>
            </header>
            <div class="px-5 py-6">
                <form id="companyRegistrationForm" class="space-y-6" method="POST" action="#">
                    @csrf {{-- exemplo estático --}}
                    
                    {{-- Campo: Razão Social --}}
                    <div>
                        <label for="razaoSocial" class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-1">
                            Razão Social
                        </label>
                        <input 
                            type="text" 
                            id="razaoSocial" 
                            name="razaoSocial" 
                            class="filament-forms-input block w-full py-2 px-4 border border-gray-300 rounded-lg dark:border-gray-600 dark:bg-gray-900 dark:text-white shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 sm:text-sm" 
                            placeholder="Digite a razão social da empresa" 
                            required>
                    </div>

                    {{-- Campo: CNPJ --}}
                    <div>
                        <label for="cnpj" class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-1">
                            CNPJ
                        </label>
                        <input 
                            type="text" 
                            id="cnpj" 
                            name="cnpj" 
                            class="filament-forms-input block w-full py-2 px-4 border border-gray-300 rounded-lg dark:border-gray-600 dark:bg-gray-900 dark:text-white shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 sm:text-sm" 
                            placeholder="00.000.000/0000-00" 
                            required>
                    </div>

                    {{-- Campo: Endereço --}}
                    <div>
                        <label for="endereco" class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-1">
                            Endereço
                        </label>
                        <input 
                            type="text" 
                            id="endereco" 
                            name="endereco" 
                            class="filament-forms-input block w-full py-2 px-4 border border-gray-300 rounded-lg dark:border-gray-600 dark:bg-gray-900 dark:text-white shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 sm:text-sm" 
                            placeholder="Rua Exemplo, nº 123 - Bairro" 
                            required>
                    </div>

                    {{-- Campo: Telefone --}}
                    <div>
                        <label for="telefone" class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-1">
                            Telefone
                        </label>
                        <input 
                            type="tel" 
                            id="telefone" 
                            name="telefone" 
                            class="filament-forms-input block w-full py-2 px-4 border border-gray-300 rounded-lg dark:border-gray-600 dark:bg-gray-900 dark:text-white shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 sm:text-sm" 
                            placeholder="(00) 00000-0000" 
                            required>
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
                            Registrar Empresa
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
