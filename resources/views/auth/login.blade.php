@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-4">
        <h2>Login</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button class="btn btn-primary" type="submit">Login</button>
            <p class="mt-2">Belum punya akun? <a href="{{ route('register') }}">Register</a></p>
        </form>
    </div>
</div>
@endsection
