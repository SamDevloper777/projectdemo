    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'Customer Dashboard')</title>
        @vite('resources/css/app.css')
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-100 font-sans antialiased">

        <!-- Navbar -->
        <nav class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
                <a href="{{ route('customer.dashboard') }}" class="text-lg font-bold text-green-600">
                    poc
                </a>
                <div class="flex items-center gap-6">
                    <a href="{{ route('customer.dashboard') }}" class="text-gray-700 hover:text-green-600">Dashboard</a>
                    <form method="POST" action="{{ route('customer.logout') }}">
                        @csrf
                        <button type="submit" class="text-gray-700 hover:text-red-600">Logout</button>
                    </form>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="max-w-7xl mx-auto px-4 py-6">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-white border-t mt-10">
            <div class="max-w-7xl mx-auto px-4 py-4 text-center text-gray-500 text-sm">
                © {{ date('Y') }} MyShop. All rights reserved.
            </div>
        </footer>

    </body>
    </html>
