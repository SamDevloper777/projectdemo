@extends('layouts.admin')

@section('title', 'Customer Details')
@section('page-title', 'Customer Details')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <h2 class="text-xl font-semibold mb-4">Customer Information</h2>

    <div class="space-y-2">
        <p><strong>ID:</strong> {{ $customer->id }}</p>
        <p><strong>Name:</strong> {{ $customer->name }}</p>
        <p><strong>Email:</strong> {{ $customer->email }}</p>
        <p><strong>Created At:</strong> {{ $customer->created_at->format('d M Y, h:i A') }}</p>
    </div>

    <div class="mt-4">
        <a href="{{ route('admin.customers.index') }}" 
           class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
            ← Back to Customers
        </a>
    </div>
</div>
@endsection
