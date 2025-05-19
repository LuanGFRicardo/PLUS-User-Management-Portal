@extends('filament.pages.menu.layouts.app')

@section('title', 'Geração de Requisições OCI')

@push('styles')
    <link href="{{ asset('vendor/tailwindcss/css/tailwind-build.css') }}" rel="stylesheet"/>
    <link href="{{ asset('vendor/tailwindcss/css/tailwind.min.css') }}" rel="stylesheet"/>
@endpush

@section('content')
    <div class="mx-auto w-full max-w-5xl space-y-8 px-4 py-10">
        {{-- Título da Página --}}
        <h2 class="text-3xl font-extrabold leading-tight tracking-tight text-gray-900 dark:text-white">
            Geração de Requisições JSON para OCI
        </h2>

        {{-- Instruções Gerais --}}
        <p class="text-sm text-gray-600 dark:text-gray-300">
            Preencha os campos abaixo conforme o tipo de recurso OCI desejado. A estrutura da requisição será gerada dinamicamente.
        </p>

        {{-- Formulário OCI --}}
        <section class="rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 shadow-sm">
            <header class="rounded-t-xl border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 px-5 py-3">
                <h2 class="text-base font-semibold text-gray-800 dark:text-white">
                    Criar Requisição OCI
                </h2>
            </header>

            <div class="px-5 py-6">
                <form id="ociRequestForm" class="space-y-6">
                    {{-- Tipo de Requisição --}}
                    <div>
                        <label for="requestType" class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-1">
                            Tipo de Requisição
                        </label>
                        <select 
                            id="requestType"
                            name="requestType"
                            class="filament-forms-input block w-full py-2 px-4 border border-gray-300 rounded-lg dark:border-gray-600 dark:bg-gray-900 dark:text-white shadow-sm sm:text-sm"
                            onchange="updateJsonPreview()"
                        >
                            <option value="user">Criar Usuário</option>
                            <option value="group">Criar Grupo</option>
                            <option value="policy">Criar Política</option>
                        </select>
                    </div>

                    {{-- Campo: Nome --}}
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-1">
                            Nome
                        </label>
                        <input 
                            type="text" 
                            id="name"
                            name="name"
                            placeholder="Ex: newuser@dominio-user.com"
                            oninput="updateJsonPreview()"
                            class="filament-forms-input block w-full py-2 px-4 border border-gray-300 rounded-lg dark:border-gray-600 dark:bg-gray-900 dark:text-white shadow-sm sm:text-sm"
                        >
                    </div>

                    {{-- Campo: Descrição --}}
                    <div>
                        <label for="description" class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-1">
                            Descrição
                        </label>
                        <input 
                            type="text" 
                            id="description"
                            name="description"
                            placeholder="Descreva o propósito desta requisição"
                            oninput="updateJsonPreview()"
                            class="filament-forms-input block w-full py-2 px-4 border border-gray-300 rounded-lg dark:border-gray-600 dark:bg-gray-900 dark:text-white shadow-sm sm:text-sm"
                        >
                    </div>

                    {{-- Campo: Statements (opcional para política) --}}
                    <div id="statementsField" style="display: none;">
                        <label for="statements" class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-1">
                            Declarações de Permissão (statements)
                        </label>
                        <textarea 
                            id="statements"
                            name="statements"
                            rows="4"
                            placeholder='Ex: Allow group web-platform-admins to manage all-resources in tenancy'
                            oninput="updateJsonPreview()"
                            class="filament-forms-input block w-full py-2 px-4 border border-gray-300 rounded-lg dark:border-gray-600 dark:bg-gray-900 dark:text-white shadow-sm sm:text-sm"
                        ></textarea>
                    </div>

                    {{-- Pré-visualização JSON --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-1">
                            Pré-visualização da Requisição JSON
                        </label>
                        <pre id="jsonPreview" class="bg-gray-100 dark:bg-gray-800 text-sm text-gray-700 dark:text-white p-4 rounded-lg overflow-auto">
{
    "compartmentId": "ocid1.tenancy.oc1.maisinteligencia.infrastructure",
    "name": "",
    "description": ""
}
                        </pre>
                    </div>

                    {{-- Botão de Envio --}}
                    <div>
                        <button 
                            type="button"
                            onclick="alert('Requisição enviada com sucesso! (simulado)')"
                            class="inline-flex items-center justify-center rounded-md 
                                   bg-primary-600 text-white 
                                   px-6 py-2.5 text-sm font-semibold shadow-sm 
                                   hover:bg-primary-700 
                                   focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition"
                        >
                            Enviar para OCI
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </div>

    {{-- Script --}}
    <script>
        function updateJsonPreview() {
            const type = document.getElementById('requestType').value;
            const name = document.getElementById('name').value;
            const description = document.getElementById('description').value;
            const statements = document.getElementById('statements').value.split('\n').filter(Boolean);
            const previewEl = document.getElementById('jsonPreview');
            const statementsField = document.getElementById('statementsField');

            let json = {
                compartmentId: "ocid1.tenancy.oc1.maisinteligencia.infrastructure",
                name: name,
                description: description
            };

            if (type === 'policy') {
                json.statements = statements;
                statementsField.style.display = 'block';
            } else {
                statementsField.style.display = 'none';
            }

            previewEl.textContent = JSON.stringify(json, null, 4);
        }

        document.addEventListener('DOMContentLoaded', updateJsonPreview);
    </script>
@endsection
