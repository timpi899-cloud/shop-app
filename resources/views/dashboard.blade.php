<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Testing Invoice</title>
</head>
<body>
    <h1>Dashboard</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="/kirim-invoice" method="POST">
        @csrf
        <button type="submit">Input Pesan Sekarang</button>
    </form>
</body>
</html>
