<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | USER METHODS
    |--------------------------------------------------------------------------
    */

    /**
     * Menampilkan riwayat pesanan milik user yang sedang login.
     */
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->latest()->get();
        return view('orders.index', compact('orders'));
    }

    /**
     * Memproses data dari Keranjang (Cart) menjadi Pesanan (Order).
     */
    public function checkout(Request $request)
    {
        // Ambil data keranjang user
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
        
        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Keranjang Anda kosong.');
        }

        // Hitung total harga seluruh item
        $total = $cartItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        });

        // Database Transaction: Memastikan data tersimpan semua atau tidak sama sekali
        DB::transaction(function () use ($cartItems, $total) {
            // 1. Buat Header Pesanan
            $order = Order::create([
                'user_id'      => Auth::id(),
                'order_number' => 'TECH-' . strtoupper(uniqid()),
                'total_price'  => $total,
                'shipping_address' => Auth::user()->address,
                'status'       => 'pending',
            ]);

            // 2. Pindahkan item dari Cart ke OrderItem
            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $item->product_id,
                    'quantity'   => $item->quantity,
                    'price'      => $item->product->price // Mengunci harga saat transaksi
                ]);

                // 3. Kurangi stok produk secara otomatis
                $item->product->decrement('stock', $item->quantity);
            }

            // 4. Bersihkan keranjang user
            Cart::where('user_id', Auth::id())->delete();
        });

        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dibuat! Silakan tunggu konfirmasi.');
    }

    /*
    |--------------------------------------------------------------------------
    | ADMIN METHODS
    |--------------------------------------------------------------------------
    */

    /**
     * Menampilkan semua pesanan masuk untuk dikelola Admin.
     */
    public function adminIndex()
    {
        $orders = Order::with('user')->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Mengupdate status pesanan (Pending -> Processing -> Completed, dll).
     */
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled'
        ]);

        $order->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status pesanan ' . $order->order_number . ' berhasil diperbarui!');
    }

    /**
 * Menampilkan detail item di dalam satu pesanan.
 */
public function show(Order $order)
{
    // Keamanan: Jika bukan admin, user hanya boleh melihat pesanan miliknya sendiri
    if (Auth::user()->role !== 'admin' && $order->user_id !== Auth::id()) {
        abort(403, 'Anda tidak memiliki akses ke pesanan ini.');
    }

    // Load relasi items dan product di dalamnya
    $order->load('items.product');

    return view('orders.show', compact('order'));
}

public function destroy($id)
{
    $order = \App\Models\Order::findOrFail($id);
    $order->delete();
    return redirect()->back()->with('success', 'Pesanan berhasil dihapus!');
}

public function adminShow($id)
{
    $order = \App\Models\Order::with('user', 'items.product')->findOrFail($id);
    return view('orders.show', compact('order'));
}
}