<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>InventarisRPL</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>

    <nav class="navbar">
    <a href="{{route('home')}}">
    <div class="logo">
            <img src="{{ asset('aset/logo.png') }}" alt="Logo">
            <span>InventarisRPL</span>
        </div>
    </a>
        <a href="{{ route('profile') }}" class="nav-link">
        <div class="user-info">
            <span> {{ $data->name }}</span>
            <img src="{{ asset('aset/user.png') }}" alt="User Icon" class="user-icon">
        </div>
        </a>
    </nav>

    
    <section class="hero">
        <div class="hero-left">
            <img src="{{ asset('aset/person.png') }}" alt="Orang Duduk">
        </div>
        <div class="hero-text">
            <h1>Tidak Punya Laptop?<br>Bukan Masalah</h1>
            <p>Sekarang sudah bisa pinjam disekolah bebas biaya!</p>
        </div>
        <div class="hero-right">
            <img src="{{ asset('aset/personn2.png') }}" alt="Laptop Vektor">
        </div>
    </section>


    <section class="alur-section">
    <h2>Alur Peminjaman Laptop InventarisRPL</h2>
    <div class="alur-image-wrapper">
        <img src="{{ asset('aset/alurpinjam.png') }}" alt="Alur Peminjaman">
    </div>
    </section>



    <section class="laptop-section">
    @foreach($laptops as $laptop)
    <div class="laptop-card">
        <h3>{{ $laptop->merk}}</h3>
        <div class="laptop-image">
            @if($laptop->gambar)
                <img src="{{ asset('storage/gambar-laptop/' . $laptop->gambar) }}" alt="{{ $laptop->merk }} {{ $laptop->tipe }}" >
            @else
                <img src="{{ asset('aset/laptop.png') }}" alt="Default Laptop Image">
            @endif
        </div>
        <form action="{{ route('laptopdetail', $laptop->id) }}" method="GET">
        <div class="laptop-buttons">
            @csrf
            <button class="btn-pinjam">
                Pinjam Sekarang
            </button>
        
        </div>
        </form>
    </div>
    @endforeach
</section>

<footer class="footer">
  <div class="footer-content">
    <p class="footer-text">© Copyrigth InventarisRPL 2025</p>
    <div class="footer-logo">
      <img src="{{ asset('aset/logo.png') }}" alt=Logo InventarisRPL">
    </div>
  </div>
</footer>
    <script src="{{ asset('js/home.js') }}"></script>
</body>
</html>
