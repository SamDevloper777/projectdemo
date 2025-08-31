<?php

namespace App\Http\Controllers\Customer;

use App\Events\OrderStatusUpdated;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Product;
use App\Notifications\NewOrderNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Models\User; // assuming admin is in users table

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $customer = Auth::guard('customer')->user();
        $product = Product::findOrFail($request->product_id);

        // Create order
        $order = Order::create([
            'customer_id' => $customer->id,
            'status' => 'pending',
            'total' => $product->price,
        ]);

        // Add product as order item
        $order->items()->create([
            'product_id' => $product->id,
            'quantity' => 1,
            'price' => $product->price,
        ]);

        return redirect()->route('customer.dashboard')->with('success', 'Order placed successfully!');
    }
    

}
