@extends('filament.pages.menu.layouts.app')

@section('title', 'Cadastro Realizado')

@push('styles')
    <link href="{{ asset('vendor/tailwindcss/css/tailwind-build.css') }}" rel="stylesheet"/>
    <link href="{{ asset('vendor/tailwindcss/css/tailwind.min.css') }}" rel="stylesheet"/>
@endpush

@section('content')
    <div class="mx-auto w-full max-w-3xl px-4 py-10 flex items-center justify-center h-screen">
        <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg shadow-lg p-8 text-center w-full">
            {{-- Ícone e título --}}
            <div class="mb-4">
                <svg class="mx-auto h-12 w-12 text-green-500" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9 12l2 2l4 -4m5 2a9 9 0 11-18 0a9 9 0 0118 0z"/>
                </svg>
                <h2 class="mt-2 text-xl font-bold text-gray-800 dark:text-white">Cadastro realizado com sucesso. Processo de aprovação em andamento.</h2>
            </div>

            {{-- Mensagem de sessão --}}
            @if (session('success'))
                <p class="text-gray-700 dark:text-gray-300 mb-2">{{ session('success') }}</p>
            @endif

            {{-- Redirecionamento automático --}}
            <p class="text-sm text-gray-500 dark:text-gray-400">
                Você será redirecionado para a tela de login em 10 segundos...
            </p>

            {{-- Fallback botão (caso JS esteja desabilitado) --}}
            <div class="mt-6">
                <a href="{{ url('/admin/login') }}"
                   class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md text-sm hover:bg-blue-700 transition">
                    Ir para Login agora
                </a>
            </div>
        </div>
    </div>

    {{-- Redirecionamento automático via JS --}}
    <script>
        setTimeout(() => {
            window.location.href = "{{ url('/admin/login') }}";
        }, 10000);
    </script>
@endsection
