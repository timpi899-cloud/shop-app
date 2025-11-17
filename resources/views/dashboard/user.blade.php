@extends('layouts.app')

@section('content')

{{-- Navbar sudah di layouts.app --}}

{{-- Main Hero / New Collection --}}
<div class="py-5 text-center bg-light mb-4 rounded">
    <h1 class="display-5 fw-bold">New Collection 2025</h1>
    <p class="lead">Tren terbaru baju Karawo untuk tahun ini.</p>
    <a href="#" class="btn btn-primary btn-lg">Shop Now</a>
</div>

{{-- Shop By Category --}}
<h3 class="mb-3">Shop By Category</h3>
<div class="row mb-4">
    <div class="col-md-6 mb-3">
        <div class="card">
            <img src="https://api.sourcesplash.com/i/random?woman" class="card-img-top" alt="Woman Category">
            <div class="card-body text-center">
                <h5 class="card-title">Women</h5>
                <a href="#" class="btn btn-outline-primary btn-sm">Explore</a>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="card">
            <img src="https://api.sourcesplash.com/i/random?woman" class="card-img-top" alt="Man Category">
            <div class="card-body text-center">
                <h5 class="card-title">Man</h5>
                <a href="#" class="btn btn-outline-primary btn-sm">Explore</a>
            </div>
        </div>
    </div>
</div>

{{-- Featured Collection --}}
<h3 class="mb-3">Featured Collection</h3>
<div class="row mb-4">
    @for ($i = 1; $i <= 3; $i++)
        <div class="col-md-4 mb-3">
        <div class="card">
            <img src="https://images.unsplash.com/photo-1600180758895-15310a0d5b05?auto=format&fit=crop&w=800&q=60" class="card-img-top" alt="Featured Product">
            <div class="card-body text-center">
                <h5 class="card-title">Baju Karawo {{ $i }}</h5>
                <p class="card-text">Rp {{ number_format(150000 + ($i * 50000),0,',','.') }}</p>
                <a href="#" class="btn btn-primary btn-sm">Buy Now</a>
            </div>
        </div>
</div>
@endfor
</div>

{{-- Footer --}}
<footer class="bg-dark text-white py-4 mt-4">
    <div class="container text-center">
        <p class="mb-1">&copy; 2025 KarawoHub. All rights reserved.</p>
        <div>
            <a href="#" class="text-white me-2">Facebook</a>
            <a href="#" class="text-white me-2">Instagram</a>
            <a href="#" class="text-white">Twitter</a>
        </div>
    </div>
</footer>

@endsection