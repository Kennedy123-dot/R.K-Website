<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Rukundo Kennedy Portfolio') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-gray-50 dark:bg-gray-900">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <!-- CUSTOM HEADER LOGO / BRAND -->
            <div class="w-full sm:max-w-md px-6 py-8 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                <div class="text-center mb-6">
                    <h1 class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">
                        Rukundo Kennedy Portfolio
                    </h1>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                        {{ $header ?? '' }}
                    </p>
                </div>

                {{ $slot }}
            </div>

            <div class="mt-6 text-center text-gray-600 dark:text-gray-400 text-sm">
                &copy; {{ date('Y') }} Rukundo Kennedy. All rights reserved.
            </div>
        </div>
    </body>
</html>