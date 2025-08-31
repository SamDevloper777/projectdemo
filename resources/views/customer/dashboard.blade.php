@extends('layouts.customer')

@section('title', 'Customer Dashboard')

@section('content')
<div class="bg-white shadow rounded-lg p-6 mb-6">
    <h1 class="text-2xl font-bold text-green-600">Welcome, {{ $customer->name }} 👋</h1>
    <p class="mt-2 text-gray-600">Here are the latest products for you:</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @forelse($products as $product)
        <div class="border rounded-lg shadow-sm p-4 hover:shadow-lg transition">
            <img src="{{ $product->image_url ?? 'https://via.placeholder.com/200' }}"
                 alt="{{ $product->name }}"
                 class="w-full h-40 object-cover rounded-md mb-3">
            <h3 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h3>
            <p class="text-gray-600 text-sm">{{ Str::limit($product->description, 50) }}</p>
            <p class="text-green-600 font-bold mt-2">₹{{ number_format($product->price, 2) }}</p>

            <form method="POST" action="{{ route('customer.orders.store') }}">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button type="submit"
                        class="mt-3 w-full bg-green-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-700 transition">
                    Buy Now
                </button>
            </form>
        </div>
    @empty
        <p class="text-gray-600">No products available right now.</p>
    @endforelse
</div>

@endsection
