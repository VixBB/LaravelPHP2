<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Siswa</title>
    <link rel="stylesheet" href="{{ secure_asset('css/profile.css') }}">
</head>
<body>

<div class="page-wrapper">
    <nav class="navbar">
            <a href="{{route('home')}}">
    <div class="logo">
            <img src="{{ secure_asset('aset/logo.png') }}" alt="Logo">
            <span>InventarisRPL</span>
        </div>
    </a>
        <div class="user-info">
            <span>{{ $data->name }}</span>
            <img src="{{ secure_asset('aset/user.png') }}" alt="User Icon" class="user-icon">
        </div>
    </nav>

    <!-- Konten Utama -->
    <main class="main-container">
        <div class="profile-box">
            <!-- Section Profile -->
            <div class="profile-left">
                <img src="{{ secure_asset('aset/user.png') }}" alt="User Icon" class="user-icon">
                <h2>{{ $data->name }}</h2>
                <a href="/logout" class="logout">Log Out</a>
            </div>

            <!-- User Detail -->
            <div class="user-detail">
                <h3>User Detail</h3>
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    <p><strong>Nama Siswa</strong><br>"{{ $data->name }}"</p>
                    <p><strong>NIS</strong><br>"{{ $data->nis ?? '' }}"</p>
                    <p><strong>NISN</strong><br>"{{ $data->nisn ?? '' }}"</p>
                </form>
            </div>
        </div>

        <div class="back-button" onclick="window.history.back()">
    <img src="{{ secure_asset('aset/back.png') }}" alt="Back">
    </div>

        <!-- Daftar Peminjaman -->
        <div class="loan-section">
            <h3>Daftar Peminjaman</h3>
        <div class="loan-list">
            @foreach($peminjaman as $pinjam)
                <div class="loan-card">
                    @if($pinjam->laptop && $pinjam->laptop->gambar)
                        <img src="{{ secure_asset('storage/gambar-laptop/' . $pinjam->laptop->gambar) }}" alt="User Icon" class="user-icon">
                    @else
                        <img src="{{ secure_asset('aset/laptop.png') }}" alt="Default Laptop Image" class="user-icon">
                    @endif
                    <p>{{ $pinjam->laptop ? $pinjam->laptop->merk . ' ' . $pinjam->laptop->tipe : 'Laptop tidak tersedia' }}</p>
                </div>
            @endforeach
        </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
  <div class="footer-content">
    <p class="footer-text">© Copyrigth InventarisRPL 2025</p>
    <div class="footer-logo">
      <img src="{{ secure_asset('aset/logo.png') }}" alt=Logo InventarisRPL">
    </div>
  </div>
    </footer>
    
</body>
</html>
