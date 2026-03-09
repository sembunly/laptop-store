<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalUsers = User::count();
        $totalRevenue = Order::sum('total_amount');
        $totalCategories = Category::count();

        return view('admin.dashboard', compact(
            'totalProducts',
            'totalOrders',
            'totalUsers',
            'totalRevenue',
            'totalCategories'
        ));
    }
}