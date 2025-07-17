<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function confirmOrder()
    {
        $orders = Order::where('user_id', auth()->id())->latest()->get();

        return view('orders.confirm', compact('orders'));
    }
}