<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
        return view('cart.index', compact('cartItems'));
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        
        // 1. Ambil jumlah input dari user, default ke 1 jika kosong
        $requestedQuantity = $request->input('quantity', 1);

        // 2. VALIDASI: Pastikan input minimal 1 dan stok mencukupi
        if ($requestedQuantity < 1) {
            return redirect()->back()->with('error', 'Jumlah minimal adalah 1.');
        }

        if ($product->stock < $requestedQuantity) {
            return redirect()->back()->with('error', 'Maaf, stok tidak mencukupi. Tersedia: ' . $product->stock);
        }

        $cart = Cart::where('user_id', Auth::id())->where('product_id', $id)->first();

        if ($cart) {
            // 3. Jika produk sudah ada di keranjang, tambahkan jumlahnya
            $newQuantity = $cart->quantity + $requestedQuantity;

            // VALIDASI: Pastikan total di keranjang tidak melebihi stok
            if ($newQuantity > $product->stock) {
                return redirect()->back()->with('error', 'Total di keranjang melebihi stok. Stok tersedia: ' . $product->stock);
            }

            $cart->update(['quantity' => $newQuantity]);
        } else {
            // 4. Jika produk baru, masukkan sesuai jumlah input
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $id,
                'quantity' => $requestedQuantity
            ]);
        }

        return redirect()->back()->with('success', $requestedQuantity . ' ' . $product->name . ' masuk ke keranjang!');
    }
}