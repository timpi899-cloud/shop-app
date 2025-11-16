@extends('layouts.app')

@section('content')
<h1>Keranjang Belanja</h1>

@if($cart->isEmpty())
    <p>Keranjang kosong</p>
@else
    <table>
        <thead>
            <tr>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cart as $item)
            <tr>
                <td>{{ $item->product->name ?? 'Produk sudah dihapus' }}</td>
                <td>
                    <form action="{{ route('cart.update', $item->id) }}" method="POST">
                        @csrf
                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1">
                        <button type="submit">Update</button>
                    </form>
                </td>
                <td>Rp {{ number_format($item->product->price ?? 0 * $item->quantity, 0, ',', '.') }}</td>
                <td>
                    <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('checkout') }}">Checkout</a>
@endif
@endsection
