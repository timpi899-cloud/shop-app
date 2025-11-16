@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h3 class="mb-3">User Dashboard</h3>
        <p class="text-muted">Halo, {{$user->name}}</p>

        <div class="row">
            <div class="col-md-6">
                <div class="p-3 border rounded bg-light">Produk Tersedia</div>
            </div>

            <div class="col-md-6">
                <div class="p-3 border rounded bg-light">Pesanan Saya</div>
            </div>
        </div>
    </div>
</div>
@endsection
