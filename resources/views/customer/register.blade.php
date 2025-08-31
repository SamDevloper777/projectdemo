<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Customer Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
  <div class="w-full max-w-sm bg-white rounded-lg shadow-md p-6">
    <h1 class="text-2xl font-bold text-center text-gray-700 mb-6">Customer Register</h1>
    <form method="POST" action="{{ route('customer.register') }}">
      @csrf

      <div class="mb-4">
        <label class="block text-gray-600">Name</label>
        <input type="text" name="name" required class="w-full mt-2 px-3 py-2 border rounded-lg focus:ring focus:ring-green-300">
      </div>

      <div class="mb-4">
        <label class="block text-gray-600">Email</label>
        <input type="email" name="email" required class="w-full mt-2 px-3 py-2 border rounded-lg focus:ring focus:ring-green-300">
      </div>

      <div class="mb-4">
        <label class="block text-gray-600">Password</label>
        <input type="password" name="password" required class="w-full mt-2 px-3 py-2 border rounded-lg focus:ring focus:ring-green-300">
      </div>

      <div class="mb-6">
        <label class="block text-gray-600">Confirm Password</label>
        <input type="password" name="password_confirmation" required class="w-full mt-2 px-3 py-2 border rounded-lg focus:ring focus:ring-green-300">
      </div>

      <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700">
        Register
      </button>

      <p class="mt-4 text-center text-gray-600 text-sm">
        Already have an account?
        <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login here</a>
      </p>
    </form>
  </div>
</body>
</html>
