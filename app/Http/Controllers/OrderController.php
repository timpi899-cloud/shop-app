<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use App\Models\Product;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('items.product')
                    ->where('user_id', auth()->id())
                    ->get();
        return view('orders.index', compact('orders'));
    }

    public function checkout(Request $request)
    {
        // Validasi request
        $request->validate([
            'address' => 'required|string',
            'phone' => 'required|string',
            'payment_method' => 'required|in:cod,transfer',
        ]);

        // Ambil semua item di cart user dengan produk
        $cartItems = Cart::with('product')
                    ->where('user_id', auth()->id())
                    ->get();

        if ($cartItems->isEmpty()) {
            return back()->with('error', 'Keranjang kosong');
        }

        // Buat order baru
        $order = Order::create([
            'user_id' => auth()->id(),
            'address' => $request->address,
            'phone' => $request->phone,
            'notes' => $request->notes,
            'payment_method' => $request->payment_method,
            'status' => $request->payment_method === 'cod' ? 'processing' : 'pending',
        ]);

        /** @var \App\Models\Cart $item */
        foreach ($cartItems as $item) {

            // Skip jika produk sudah dihapus
            if (!$item->product) continue;

            // Ambil harga member atau normal
            $price = $item->product->member_price ?? $item->product->price;

            // Buat order item
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $price,
            ]);
        }

        // Hapus semua item cart user
        Cart::where('user_id', auth()->id())->delete();

        return redirect()->route('orders.index')->with('success', 'Checkout berhasil');
    }

    public function uploadPayment(Request $request, $id)
    {
        $request->validate([
            'payment_proof' => 'required|image|max:2048',
        ]);

        $order = Order::where('id', $id)
                    ->where('user_id', auth()->id())
                    ->firstOrFail();

        $path = $request->file('payment_proof')->store('payments', 'public');

        $order->update([
            'payment_proof' => $path,
            'status' => 'paid',
        ]);

        return back()->with('success', 'Bukti pembayaran berhasil diunggah');
    }
}
