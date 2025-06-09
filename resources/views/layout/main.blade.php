<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>InventarisRPL</title>
    <link rel="stylesheet" href="{{ secure_asset('css/home.css') }}">
</head>
<body>

    <nav class="navbar">
    <a href="{{route('home')}}">
    <div class="logo">
            <img src="{{ secure_asset('aset/logo.png') }}" alt="Logo">
            <span>InventarisRPL</span>
        </div>
    </a>
        <a href="" class="nav-link">
        <div class="user-info">
            <span>DiahAyuManik</span>
            <img src="{{ secure_asset('aset/user.png') }}" alt="User Icon" class="user-icon">
        </div>
        </a>
    </nav>

    @yield('section')
   
    <footer class="footer">
    <div class="footer-content">
        <p class="footer-text">© Copyrigth InventarisRPL 2025</p>
        <div class="footer-logo">
        <img src="{{ secure_asset('aset/logo.png') }}" alt=Logo InventarisRPL">
        </div>
    </div>
    </footer>

    <script src="{{ secure_asset('js/home.js') }}"></script>
</body>
</html>
