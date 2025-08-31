@extends('layouts.admin')

@section('title', 'Order Details')
@section('page-title', 'Order Details')

@section('content')
<div class="bg-white p-4 rounded shadow">
    <h2 class="text-lg font-semibold mb-4">Order #{{ $order->id }}</h2>

    <p><strong>Customer:</strong> {{ $order->customer->name }}</p>
    <p><strong>Email:</strong> {{ $order->customer->email }}</p>
    <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
    <p><strong>Total:</strong> ₹{{ number_format($order->total, 2) }}</p>

    <h3 class="mt-4 font-semibold">Items</h3>
    <ul class="list-disc pl-6 mt-2">
        @foreach($order->items as $item)
            <li>{{ $item->product->name }} x {{ $item->quantity }} - ₹{{ number_format($item->price, 2) }}</li>
        @endforeach
    </ul>
</div>
@endsection
