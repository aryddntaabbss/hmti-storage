<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" type="image/png" href="asset/img/logo.png" />

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans antialiased bg-gray-100 text-gray-900 dark:bg-gray-800 dark:text-white">
        <div class="min-h-screen">
            @include('layouts.navbar')

            <!-- Page Heading -->
            @isset($header)
            <header class="bg-white shadow dark:bg-gray-700">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
            @endisset

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
        </div>

        <!-- JavaScript to toggle dark mode -->
        <script>
            // Check for stored user theme preference, default to light if not set
            const currentMode = localStorage.getItem('theme') || 'light';

            // Apply the correct theme when the page loads
            if (currentMode === 'dark') {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }

            // Toggle dark mode on button click (if you want a button to toggle it)
            const toggleButton = document.getElementById('mode-toggle');
            if (toggleButton) {
                toggleButton.addEventListener('click', () => {
                    if (document.documentElement.classList.contains('dark')) {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('theme', 'light');
                    } else {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('theme', 'dark');
                    }
                });
            }
        </script>
    </body>

</html>