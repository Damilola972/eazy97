<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class AdminOrderController extends Controller
{
    // Show all orders
    public function index()
    {
        $orders = Order::latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    // Mark an order as delivered
    public function markAsDelivered(Order $order)
    {
        $order->update(['status' => 'delivered']);
        return redirect()->back()->with('success', 'Order marked as delivered.');
    }
}
