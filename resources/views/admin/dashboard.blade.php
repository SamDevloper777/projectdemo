@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-3 gap-6">
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-lg font-semibold mb-2">Total Products</h2>
            <p class="text-3xl font-bold text-blue-600">{{ $totalProducts }}</p>
        </div>
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-lg font-semibold mb-2">Total Customers</h2>
            <p class="text-3xl font-bold text-green-600">{{ $totalCustomers }}</p>
        </div>
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-lg font-semibold mb-2">Total Orders</h2>
            <p class="text-3xl font-bold text-purple-600">{{ $totalOrders }}</p>
        </div>
    </div>
@endsection
