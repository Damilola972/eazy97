<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CartItem;

class PlaceOrderController extends Controller
{
    public function index()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Fetch all cart items for this user, along with product details
        $cartItems =CartItem::with('product')->where('user_id', $user->id)->get();

        // Pass to view
        return view('orders.place', compact('cartItems'));
    }
}