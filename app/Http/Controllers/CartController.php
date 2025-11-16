<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::with('product')
                    ->where('user_id', auth()->id())
                    ->get();
        return view('cart.index', compact('cart'));
    }

    public function add($id)
    {
        $product = Product::findOrFail($id);

        $cart = Cart::firstOrCreate(
            ['user_id' => auth()->id(), 'product_id' => $product->id],
            ['quantity' => 1]
        );

        if (!$cart->wasRecentlyCreated) {
            $cart->increment('quantity');
        }

        return back()->with('success', 'Produk ditambahkan ke keranjang');
    }

    public function update(Request $request, $id)
    {
        $request->validate(['quantity' => 'required|integer|min:1']);

        $cart = Cart::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $cart->update(['quantity' => $request->quantity]);

        return back()->with('success', 'Jumlah produk diperbarui');
    }

    public function remove($id)
    {
        $cart = Cart::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $cart->delete();

        return back()->with('success', 'Produk dihapus dari keranjang');
    }
}