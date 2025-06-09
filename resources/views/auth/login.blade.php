<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login InventarisRPL</title>
    <link rel="stylesheet" href="{{ secure_asset('css/login.css') }}">
</head>
<body>
    <div class="login-container">
        <div class="login-left">
            <div class="login-box">
                <h1 class="title">Selamat Datang</h1>
                <p class="subtitle">Silahkan masukan data anda untuk login!</p>
                    
                    <form action="{{route('login-proses')}}" method="POST">
                    @csrf
                    <label for="name">Username</label>
                    <input type="text" name="name" id="name" placeholder="Masukan username anda" required>
                    @error('name')
                        <small>{{ $message }}</small>
                    @enderror

                    <label for="password">Password</label>
                    <div class="password-field">
                        <input type="password" name="password" id="password" placeholder="Masukan password anda" required>
                        <span id="togglePassword" class="toggle-icon">&#128065;</span>
                        @error('password')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="login-button">LOGIN</button>
                    </form>
            </div>
        </div>
        <div class="login-right">
            <img src="{{ secure_asset('aset/imgg.png') }}" alt="Login Illustration">
        </div>
    </div>

    <script src="{{ secure_asset('js/login.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if( $message = Session::get('failed'))
        <script>
        Swal.fire("{{ $message }}");
        </script>
    @endif
</body>
</html>
