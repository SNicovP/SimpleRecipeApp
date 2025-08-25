<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="color-scheme" content="light only">
    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')

    <style>
        header {
            padding-top: 10px;
            text-align: center;
            background: gray;
            color: #f7f784;
            min-height: 50px;
            border-bottom: #f7f784;
            font-family: 'Courier New', Courier, monospace;
        }

        main {
            background: #808080;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            padding-top: 13px;
            min-height: 50px;
            text-align: center;
            background: grey;
            color: #FFD1DC;
        }
    </style>
</head>
<body class="font-sans antialiased bg-[#808080]">

    <div class="min-h-screen flex flex-col">
        {{-- Navigation --}}
        @include('layouts.navigation')

        {{-- Optional Page Heading --}}
        {{-- @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @else --}}
            {{-- Default App Header --}}
            {{-- <header class="text-3xl font-semibold">
                Your Recipe List
            </header>
        @endisset  --}}

        {{-- Page Content --}}
        <main class="flex-grow">
            {{ $slot ?? '' }}
            @yield('content') {{-- For older blade files --}}
        </main>

        {{-- Footer --}}
        <footer>
            Best App by Fowl Inc @ 2025
        </footer>
    </div>

    @stack('scripts')
</body>
</html>