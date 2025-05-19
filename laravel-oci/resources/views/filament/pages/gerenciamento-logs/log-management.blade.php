@extends('filament.pages.menu.layouts.app')

@section('title', 'Logs de Requisições')

@push('styles')
    <link href="{{ asset('vendor/tailwindcss/css/tailwind-build.css') }}" rel="stylesheet"/>
    <link href="{{ asset('vendor/tailwindcss/css/tailwind.min.css') }}" rel="stylesheet"/>
@endpush

@section('content')
    <div class="mx-auto w-full max-w-6xl space-y-8 px-4 py-10">
        {{-- Título da Página --}}
        <h2 class="text-3xl font-extrabold leading-tight tracking-tight text-gray-900 dark:text-white">
            Histórico de Logs - Requisições OCI
        </h2>

        {{-- Instrução --}}
        <p class="text-sm text-gray-600 dark:text-gray-300">
            Visualize os eventos registrados no sistema com base nas diretrizes de auditoria e segurança da informação (ISO/IEC 27001).
        </p>

        {{-- Painel de Logs --}}
        <section class="rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 shadow-sm">
            <header class="rounded-t-xl border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 px-5 py-3">
                <h2 class="text-base font-semibold text-gray-800 dark:text-white">
                    Últimos Eventos Registrados
                </h2>
            </header>

            <div class="px-5 py-6 space-y-4">
                {{-- Log Simulado - JSON --}}
                <div class="rounded-lg bg-gray-100 dark:bg-gray-800 text-sm text-gray-800 dark:text-white p-4 font-mono overflow-x-auto shadow-sm border border-gray-300 dark:border-gray-700">
<pre>{
    "timestamp": "2025-05-19T10:34:22-03:00",
    "user": "luan.ricardo",
    "ip": "10.10.10.55",
    "action": "CREATE",
    "description": "Criação de grupo 'Admins OCI'",
    "status": "SUCCESS",
    "system": "grapesjs-sqlserver-project"
}</pre>
                </div>

                <div class="rounded-lg bg-gray-100 dark:bg-gray-800 text-sm text-gray-800 dark:text-white p-4 font-mono overflow-x-auto shadow-sm border border-gray-300 dark:border-gray-700">
<pre>{
    "timestamp": "2025-05-19T09:45:10-03:00",
    "user": "maria.oliveira",
    "ip": "10.10.10.33",
    "action": "UPDATE",
    "description": "Atualização da política 'Visualização Financeira'",
    "status": "SUCCESS",
    "system": "grapesjs-sqlserver-project"
}</pre>
                </div>

                <div class="rounded-lg bg-gray-100 dark:bg-gray-800 text-sm text-gray-800 dark:text-white p-4 font-mono overflow-x-auto shadow-sm border border-gray-300 dark:border-gray-700">
<pre>{
    "timestamp": "2025-05-18T18:27:01-03:00",
    "user": "admin",
    "ip": "10.10.10.1",
    "action": "DELETE",
    "description": "Tentativa de exclusão do grupo 'Financeiro'",
    "status": "FAILURE",
    "system": "grapesjs-sqlserver-project"
}</pre>
                </div>

                {{-- Botão Atualizar Logs --}}
                <div class="flex justify-end pt-4">
                    <button
                        type="button"
                        onclick="location.reload()"
                        class="inline-flex items-center justify-center rounded-md 
                               bg-primary-600 text-white 
                               px-6 py-2.5 text-sm font-semibold shadow-sm 
                               hover:bg-primary-700 
                               focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition"
                    >
                        Atualizar Logs
                    </button>
                </div>
            </div>
        </section>
    </div>
@endsection
