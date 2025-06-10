@extends('filament.pages.menu.layouts.app')

@section('title', 'Aprovação em andamento')

@push('styles')
    <link href="{{ asset('vendor/tailwindcss/css/tailwind-build.css') }}" rel="stylesheet"/>
    <link href="{{ asset('vendor/tailwindcss/css/tailwind.min.css') }}" rel="stylesheet"/>
@endpush

@section('content')
    <div class="mx-auto w-full max-w-3xl px-4 py-10 flex items-center justify-center h-screen">
        <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg shadow-lg p-8 text-center w-full">
            {{-- Ícone e título --}}
            <div class="mb-4">
                <svg class="mx-auto h-12 w-12 text-red-500" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M6 18L18 6M6 6l12 12" />
                </svg>
                <h2 class="mt-2 text-xl font-bold text-gray-800 dark:text-white">
                    Informamos que sua solicitação de acesso não foi aprovada por nossa equipe técnica.
                </h2>
            </div>

            {{-- Mensagem de sessão --}}
            @if (session('error'))
                <p class="text-gray-700 dark:text-gray-300 mb-2">{{ session('error') }}</p>
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
