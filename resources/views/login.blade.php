<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Customer Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
  <div class="w-full max-w-sm bg-white rounded-lg shadow-md p-6">
    <h1 class="text-2xl font-bold text-center text-gray-700 mb-6">Customer Login</h1>

    @if ($errors->any())
      <div class="mb-4 p-3 text-sm text-red-700 bg-red-100 rounded-lg">
        <ul class="list-disc pl-4">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div class="mb-4">
        <label class="block text-gray-600">Email</label>
        <input type="email" name="email" value="{{ old('email') }}"
               required
               class="w-full mt-2 px-3 py-2 border rounded-lg focus:ring focus:ring-blue-300">
      </div>

      <div class="mb-4">
        <label class="block text-gray-600">Password</label>
        <input type="password" name="password" required
               class="w-full mt-2 px-3 py-2 border rounded-lg focus:ring focus:ring-blue-300">
      </div>

      <button type="submit"
              class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
        Login
      </button>

      <p class="mt-4 text-center text-gray-600 text-sm">
        Don’t have an account?
        <a href="{{ route('customer.register') }}" class="text-blue-600 hover:underline">Register</a>
      </p>
    </form>
  </div>
</body>
</html>
