@extends('layouts.app')

@section('content')
<h1>Daftar Pesanan</h1>

@if($orders->isEmpty())
    <p>Belum ada pesanan</p>
@else
    @foreach($orders as $order)
        <div class="order-card">
            <p>ID Pesanan: {{ $order->id }}</p>
            <p>Status: {{ $order->status }}</p>
            <p>Alamat: {{ $order->address }}</p>
            <p>Nomor HP: {{ $order->phone }}</p>
            <p>Items:</p>
            <ul>
                @foreach($order->items as $item)
                    <li>{{ $item->product->name ?? 'Produk sudah dihapus' }} x {{ $item->quantity }} - Rp {{ number_format($item->price, 0, ',', '.') }}</li>
                @endforeach
            </ul>
        </div>
    @endforeach
@endif
@endsection
