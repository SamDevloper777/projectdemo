<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-900 via-gray-800 to-black font-['Instrument_Sans']">

    <div class="text-center">
        <!-- Title -->
        <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-12">
            Welcome to <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-500 to-pink-500">
                {{ config('app.name', 'Laravel') }}
            </span>
        </h1>

        <!-- Buttons Container -->
        <div class="flex flex-col md:flex-row gap-8 justify-center">
            
            <!-- Admin Login -->
            <a href="{{ route('admin.login') }}" aria-label="Admin Login"
               class="group relative flex flex-col gap-2 h-40 w-40 items-center justify-center rounded-full bg-gradient-to-tr from-orange-500 to-pink-600 shadow-2xl transition transform hover:scale-110 hover:rotate-3 hover:shadow-pink-500/40">
                <span class="text-4xl">👑</span>
                <span class="text-white text-xl font-bold">Admin</span>
                <!-- Glow effect -->
                <span class="absolute inset-0 rounded-full bg-gradient-to-tr from-orange-500 to-pink-600 blur-xl opacity-70 group-hover:opacity-100 transition z-[-1]"></span>
            </a>

            <!-- Customer Login -->
            <a href="{{ route('login') }}" aria-label="Customer Login"
               class="group relative flex flex-col gap-2 h-40 w-40 items-center justify-center rounded-full bg-gradient-to-tr from-pink-500 to-purple-600 shadow-2xl transition transform hover:scale-110 hover:-rotate-3 hover:shadow-purple-500/40">
                <span class="text-4xl">👤</span>
                <span class="text-white text-xl font-bold">Customer</span>
                <!-- Glow effect -->
                <span class="absolute inset-0 rounded-full bg-gradient-to-tr from-pink-500 to-purple-600 blur-xl opacity-70 group-hover:opacity-100 transition z-[-1]"></span>
            </a>

        </div>
    </div>

</body>
</html>
