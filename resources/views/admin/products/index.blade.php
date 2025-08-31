@extends('layouts.admin')

@section('title', 'Products')

@section('content')
<div class="bg-white rounded-lg p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-semibold">Products</h1>

        <div class="flex items-center space-x-2">
            <form action="{{ route('admin.products.import') }}" method="POST" enctype="multipart/form-data" class="flex items-center space-x-2">
                @csrf
                <input type="file" name="file" required class="border px-2 py-1 text-sm">
                <button type="submit" class="px-3 py-1 bg-gray-200 hover:bg-gray-300 text-sm rounded">
                    Import
                </button>
            </form>

            <a href="{{ route('admin.products.create') }}"
               class="px-3 py-1 bg-gray-200 hover:bg-gray-300 text-sm rounded">
                Add Product
            </a>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-3 py-2 text-left text-sm border-b">#</th>
                    <th class="px-3 py-2 text-left text-sm border-b">Image</th>
                    <th class="px-3 py-2 text-left text-sm border-b">Name</th>
                    <th class="px-3 py-2 text-left text-sm border-b">Category</th>
                    <th class="px-3 py-2 text-left text-sm border-b">Price</th>
                    <th class="px-3 py-2 text-left text-sm border-b">Stock</th>
                    <th class="px-3 py-2 text-left text-sm border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr class="border-b">
                    <td class="px-3 py-2 text-sm">{{ $loop->iteration }}</td>
                    <td class="px-3 py-2">
                        <img src="{{ asset('storage/'.$product->image) }}" class="w-10 h-10 object-cover border">
                    </td>
                    <td class="px-3 py-2 text-sm">{{ $product->name }}</td>
                    <td class="px-3 py-2 text-sm">{{ $product->category }}</td>
                    <td class="px-3 py-2 text-sm">₹{{ number_format($product->price, 2) }}</td>
                    <td class="px-3 py-2 text-sm">{{ $product->stock > 0 ? $product->stock : 'Out' }}</td>
                    <td class="px-3 py-2 text-sm flex space-x-2">
                        <a href="{{ route('admin.products.edit', $product->id) }}"
                           class="px-2 py-1 bg-gray-200 hover:bg-gray-300 text-xs rounded">
                            Edit
                        </a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                              onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="px-2 py-1 bg-gray-200 hover:bg-gray-300 text-xs rounded">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-3">
        {{ $products->links() }}
    </div>
</div>
@endsection
