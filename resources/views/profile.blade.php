<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Siswa</title>
    <link rel="stylesheet" href="{{ secure_asset('css/profile.css') }}">
      <link rel="stylesheet" href="{{ secure_asset ('css/home.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ secure_asset ('lte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ secure_asset('lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ secure_asset ('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ secure_asset ('lte/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ secure_asset ('lte/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ secure_asset ('lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ secure_asset ('lte/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ secure_asset ('lte/plugins/summernote/summernote-bs4.min.css') }}">
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

                        @if($pinjam->laptop->status == 'dipinjam')
                          <span class="badge badge-warning">Dipinjam</span>
                        @elseif($pinjam->laptop->status == 'tersedia')
                          <span class="badge badge-success">Dikembalikan</span>
                        @endif
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

    <script src="{{ secure_asset ('lte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ secure_asset ('lte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ secure_asset ('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ secure_asset ('lte/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ secure_asset ('lte/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ secure_asset ('lte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ secure_asset ('lte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ secure_asset ('lte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ secure_asset ('lte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ secure_asset ('lte/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ secure_asset ('lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ secure_asset ('lte/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ secure_asset ('lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ secure_asset ('lte/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ secure_asset ('lte/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ secure_asset ('lte/dist/js/pages/dashboard.js') }}"></script>
    
</body>
</html>
