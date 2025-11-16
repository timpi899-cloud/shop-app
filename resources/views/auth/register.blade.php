@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 500px; margin-top: 50px;">
    <h2 class="mb-4 text-center">Register</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Waduh!</strong> Masih ada yang salah nih.
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register.post') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nomor HP (Opsional)</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat (Opsional)</label>
            <textarea name="address" class="form-control">{{ old('address') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary w-100">Daftar</button>

    </form>
</div>
@endsection
