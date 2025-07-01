<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portal Layanan Kota')</title>
    <style>
        body { font-family: sans-serif; padding: 20px; background: #f9f9f9; }
        h1 { color: #2c3e50; }
        .opd-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 16px; margin-top: 20px; }
        .opd-card { background: white; padding: 15px; border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
    </style>
</head>
<body>
    @if (session('session'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif
    <h1>Portal Layanan Kota</h1>
    
    @yield('content')
</body>
</html>