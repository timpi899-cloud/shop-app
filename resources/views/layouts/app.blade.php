<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KarawoHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4 shadow-sm">
        <div class="container">

            {{-- Logo / Brand --}}
            <a class="navbar-brand fw-bold" 
                href="{{ Auth::check() 
                        ? (Auth::user()->role === 'admin' 
                            ? route('admin.dashboard') 
                            : route('user.dashboard')) 
                        : route('login') }}">
                KarawoHub
            </a>

            <div class="d-flex">
                @auth
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-outline-danger btn-sm" type="submit">Logout</button>
                </form>
                @endauth
            </div>

        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

</body>
</html>
