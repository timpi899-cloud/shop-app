@extends('layouts.app')

@section('content')
<h1>Membership</h1>

@foreach($memberships as $membership)
    <div class="membership-card">
        <h3>{{ $membership->name }}</h3>
        <p>Harga: Rp {{ number_format($membership->price, 0, ',', '.') }}</p>
        <p>Durasi: {{ $membership->duration_days }} hari</p>

        <form action="{{ route('membership.join', $membership->id) }}" method="POST">
            @csrf
            <button type="submit">Join</button>
        </form>
    </div>
@endforeach
@endsection
