<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sistema ADS') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="flex flex-col min-h-screen bg-gradient-to-b" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" x-init="$watch('darkMode', val => { localStorage.setItem('darkMode', val); document.documentElement.classList.toggle('dark', val) })" :class="{ 'dark': darkMode }">
        <!-- Navbar -->
        <header class="sticky top-0 z-50 apple-glass">
            <div class="container mx-auto flex h-16 items-center justify-between px-4">
                <a href="{{ route('home') }}" class="font-medium text-xl tracking-tight">
                    Sistema ADS
                </a>
                <nav class="flex items-center gap-6">
                    <a href="{{ route('estudantes.index') }}" class="rounded-full text-sm font-medium inline-flex items-center justify-center whitespace-nowrap px-5 py-2 apple-button">
                        Estudantes
                    </a>
                    <a href="{{ route('turmas.index') }}" class="rounded-full text-sm font-medium inline-flex items-center justify-center whitespace-nowrap px-5 py-2 apple-button">
                        Turmas
                    </a>
                    <button @click="darkMode = !darkMode" type="button" class="rounded-full p-2 apple-button">
                        <svg x-show="!darkMode" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                        </svg>
                        <svg x-show="darkMode" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" style="display: none;">
                            <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </nav>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-grow">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="py-6 md:py-0 apple-glass mt-auto">
            <div class="container mx-auto flex flex-col items-center justify-between gap-4 md:h-16 md:flex-row px-4">
                <p class="text-sm text-muted-foreground">
                    &copy; {{ date('Y') }} Sistema de Gerenciamento de Estudantes ADS
                </p>
                <p class="text-sm text-muted-foreground">
                    Desenvolvido para o curso de Análise e Desenvolvimento de Sistemas
                </p>
            </div>
        </footer>
    </div>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>