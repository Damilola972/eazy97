<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::where('user_id', Auth::id())->get();
        return view('cart.index', compact('cartItems'));
    }

    public function destroy($id)
    {
        $item = CartItem::where('user_id', Auth::id())->where('id', $id)->first();
        if ($item) {
            $item->delete();
        }
        return back()->with('success', 'Item removed from cart.');
    }

    public function reset()
    {
        CartItem::where('user_id', Auth::id())->delete();
        return back()->with('success', 'Cart cleared successfully.');
    }
}