<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">

    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-60 bg-white border-r border-gray-200 flex flex-col">
            <!-- Logo / Title -->
            <div class="p-4 text-lg font-bold border-b border-gray-200">
                Admin Panel
            </div>

            <!-- Navigation -->
            <nav class="flex-1 p-3">
                <ul class="space-y-1">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" 
                           class="block px-3 py-2 rounded hover:bg-gray-100 
                                  {{ request()->routeIs('admin.dashboard') ? 'bg-gray-200 font-medium' : '' }}">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.products.index') }}" 
                           class="block px-3 py-2 rounded hover:bg-gray-100 
                                  {{ request()->routeIs('admin.products.*') ? 'bg-gray-200 font-medium' : '' }}">
                            Products
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.customers.index') }}" 
                           class="block px-3 py-2 rounded hover:bg-gray-100 
                                  {{ request()->routeIs('admin.customers.*') ? 'bg-gray-200 font-medium' : '' }}">
                            Customers
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.orders.index') }}" 
                           class="block px-3 py-2 rounded hover:bg-gray-100 
                                  {{ request()->routeIs('admin.orders.*') ? 'bg-gray-200 font-medium' : '' }}">
                            Orders
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Logout -->
            <div class="p-3 border-t border-gray-200">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" 
                            class="w-full px-3 py-2 text-sm bg-gray-200 hover:bg-gray-300 rounded">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <div class="flex-1 flex flex-col">
            <!-- Top Navbar -->
            <header class="bg-white border-b border-gray-200 p-4 flex justify-between items-center">
                <h1 class="text-base font-semibold">@yield('page-title', 'Dashboard')</h1>
                <div class="text-sm">
                    Welcome, {{ Auth::guard('admin')->user()->name ?? 'Admin' }}
                </div>
            </header>

            <!-- Page Content -->
            <main class="p-6 flex-1 overflow-y-auto">
                @yield('content')
            </main>
        </div>
    </div>

</body>
</html>
