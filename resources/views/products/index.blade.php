@extends('layouts.app')

@section('content')
<h1>Daftar Produk</h1>
<div class="products">
    @foreach($products as $product)
        <div class="product-card">
            <img src="{{ $product->image ?? 'https://via.placeholder.com/150' }}" alt="{{ $product->name }}" width="150">
            <h3>{{ $product->name }}</h3>
            <p>{{ $product->description }}</p>
            <p>Harga: Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            @auth
            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <button type="submit">Tambah ke Keranjang</button>
            </form>
            @else
            <p><a href="{{ route('login') }}">Login untuk beli</a></p>
            @endauth
        </div>
    @endforeach
</div>
@endsection
