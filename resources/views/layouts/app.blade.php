<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'My App' }}</title>
    @vite('resources/css/app.css') 
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-blue-600">MyApp</a>
            <div class="space-x-4">
                @auth('admin')
                    <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-blue-600">Admin Dashboard</a>
                    <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-red-500 hover:text-red-700">Logout</button>
                    </form>
                @endauth

                @auth('customer')
                    <a href="{{ route('customer.dashboard') }}" class="text-gray-700 hover:text-blue-600">Customer Dashboard</a>
                    <form action="{{ route('customer.logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-red-500 hover:text-red-700">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto mt-6 px-4">
        @yield('content')
    </main>

</body>
</html>
