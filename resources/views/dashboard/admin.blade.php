@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h3 class="mb-3">Admin Dashboard</h3>
        <p class="text-muted">Halo {{$user->name}}</p>

        <div class="row">
            <div class="col-md-4">
                <div class="p-3 border rounded bg-light">Kelola Produk</div>
            </div>

            <div class="col-md-4">
                <div class="p-3 border rounded bg-light">Kelola User</div>
            </div>

            <div class="col-md-4">
                <div class="p-3 border rounded bg-light">Laporan</div>
            </div>
        </div>
    </div>
</div>
@endsection
