<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // 1. Total Pendapatan dari pesanan yang sudah 'completed'
        $totalRevenue = Order::where('status', 'completed')->sum('total_price');

        // 2. Jumlah Pesanan yang perlu diproses (pending & processing)
        $pendingOrders = Order::whereIn('status', ['pending', 'processing'])->count();

        // 3. Total Produk  yang terdaftar
        $totalProducts = Product::count();

        // 4. Total Pelanggan (User dengan role 'user')
        $totalCustomers = User::where('role', 'user')->count();

        // 5. Ambil 5 pesanan terbaru untuk ditampilkan di tabel ringkasan
        $recentOrders = Order::with('user')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalRevenue', 
            'pendingOrders', 
            'totalProducts', 
            'totalCustomers',
            'recentOrders'
        ));
    }

  public function users()
{
    $users = \App\Models\User::where('role', 'user')->latest()->get();
    
    return view('admin.users.index', compact('users'));
}

public function destroy(Order $order)
{
    try {
        $order->delete();
        return redirect()->back()->with('success', 'Pesanan berhasil dihapus.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal menghapus pesanan.');
    }
}
}