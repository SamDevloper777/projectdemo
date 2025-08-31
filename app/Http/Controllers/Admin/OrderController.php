<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        
        $orders = Order::with(['customer', 'items.product'])->latest()->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }

    public function updateStatus(Request $request, Order $order)
{
    $request->validate([
        'status' => 'required|in:pending,shipped,delivered',
    ]);

    $order->update(['status' => $request->status]);

    // event(neOrderStatusUpdated($order));

    return back()->with('success', 'Order status updated!');
}
    public function show(Order $order)
    {
       
        $order->load(['customer', 'items.product']);

        return view('admin.orders.show', compact('order'));
    }
}
