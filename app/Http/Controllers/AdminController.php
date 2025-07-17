<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
 public function dashboard()
{
    $totalProducts = Product::count();
    $totalOrders = Order::count();
    $totalRevenue = Order::sum('total');
    $totalUsers = User::count();

    // Chart Data
    $months = [];
    $monthlyOrderCounts = [];

    for ($i = 1; $i <= 12; $i++) {
        $months[] = date('F', mktime(0, 0, 0, $i, 1));
        $monthlyOrderCounts[] = Order::whereMonth('created_at', $i)->count();
    }

    // Percentage change in orders
    $currentMonth = now()->month;
    $lastMonth = now()->subMonth()->month;

    $currentMonthOrders = Order::whereMonth('created_at', $currentMonth)->count();
    $lastMonthOrders = Order::whereMonth('created_at', $lastMonth)->count();

    $orderChange = $lastMonthOrders > 0
        ? round((($currentMonthOrders - $lastMonthOrders) / $lastMonthOrders) * 100)
        : null;

    return view('admin.dashboard', compact(
        'totalProducts',
        'totalOrders',
        'totalRevenue',
        'totalUsers',
        'months',
        'monthlyOrderCounts',
        'orderChange'
    ));
}
}