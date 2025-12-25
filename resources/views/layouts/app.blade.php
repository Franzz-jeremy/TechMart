<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'TechMart') }} | Dashboard</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body { font-family: 'Plus Jakarta Sans', sans-serif; }
            /* Custom Scrollbar untuk kesan tech */
            ::-webkit-scrollbar { width: 8px; }
            ::-webkit-scrollbar-track { background: #f8fafc; }
            ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
            ::-webkit-scrollbar-thumb:hover { background: #3b82f6; }
        </style>
    </head>
    <body class="antialiased selection:bg-blue-600 selection:text-white">
        <div class="min-h-screen bg-[#f8fafc]">
            @include('layouts.navigation')

            @isset($header)
                <header class="bg-white border-b border-slate-100 shadow-sm shadow-slate-200/50 relative z-10">
                    <div class="max-w-7xl mx-auto pt-6 pb-4 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="mt-4">
                    @if(session('success'))
                        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
                             class="flex items-center p-4 mb-4 text-emerald-800 rounded-[1.5rem] bg-emerald-50 border border-emerald-100 shadow-sm transition-all duration-500" role="alert">
                            <div class="bg-emerald-500 p-1.5 rounded-lg mr-3">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div class="text-[10px] font-black uppercase tracking-widest">{{ session('success') }}</div>
                        </div>
                    @endif

                    @if(session('error'))
                        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
                             class="flex items-center p-4 mb-4 text-red-800 rounded-[1.5rem] bg-red-50 border border-red-100 shadow-sm" role="alert">
                            <div class="bg-red-500 p-1.5 rounded-lg mr-3">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </div>
                            <div class="text-[10px] font-black uppercase tracking-widest">{{ session('error') }}</div>
                        </div>
                    @endif
                </div>

                <main>
                    {{ $slot }}
                </main>
            </div>

            <footer class="py-12 text-center">
                <div class="w-12 h-[1px] bg-slate-200 mx-auto mb-6"></div>
                <p class="text-[10px] font-black uppercase tracking-[0.4em] text-slate-300">
                    &copy; {{ date('Y') }} TechMart Terminal System v1.0
                </p>
            </footer>
        </div>
    </body>
</html>