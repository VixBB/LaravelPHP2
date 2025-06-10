<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{$laptop->merk}}</title>
    <link rel="stylesheet" href="{{ secure_asset('css/moredetail.css') }}">
</head>
<body>

    <nav class="navbar">
    <a href="{{route('home')}}">
    <div class="logo">
            <img src="{{ secure_asset('aset/logo.png') }}" alt="Logo">
            <span>InventarisRPL</span>
        </div>
    </a>
        <a href="{{ route('profile')}}" class="nav-link">
        <div class="user-info">
            <span>{{$data->name}}</span>
            <img src="{{ secure_asset('aset/user.png') }}" alt="User Icon" class="user-icon">
        </div>
        </a>
    </nav>

    <div class="back-button" onclick="window.history.back()">
    <img src="{{ secure_asset('aset/back.png') }}" alt="Back">
    </div>

    <div class="detail-container">
        <h2 class="detail-title">{{$laptop->merk}}</h2>

        <div class="detail-image">
            <img src="{{ secure_asset('storage/gambar-laptop/'. $laptop->gambar) }}" alt="{{ $laptop->merk}}">
        </div>

        <div class="detail-specs">


        
            <ul>
             <li><strong>Prosesor:</strong> {{$laptop->cpu}}</li>
             <li><strong>RAM:</strong>  {{$laptop->ram}}</li>
             <li><strong>GPU:</strong>  {{$laptop->gpu}}</li>
             <li><strong>Penyimpanan:</strong> {{$laptop->storage}}</li>
             <li><strong>Port:</strong> {{$laptop->port}}</li>
            </ul>
            <p class="detail-desc">
                {{ $laptop->deskripsi   }}
            </p>
            <form action="{{ route('pinjam') }}" method="POST">
            @csrf
            @if($laptop->status == 'tersedia')
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="laptop_id" value="{{ $laptop->id }}">
                <input type="hidden" name="tanggal_pinjam" value="{{ date('Y-m-d') }}">
                <input type="hidden" name="status" value="dipinjam">
                <button type="submit" class="pinjam-btn">
                    Pinjam Sekarang
                </button>
            @else
                <button type="button" class="dipinjam-btn" disabled>
                    Sedang dipinjam
                </button>
            @endif
            </form>
            <div class="center-btn">
            
            </div>
        </div>  
</div>

    <footer class="footer">
    <div class="footer-content">
    <p class="footer-text">© Copyrigth InventarisRPL 2025</p>
    <div class="footer-logo">
      <img src="{{ secure_asset('aset/logo.png') }}" alt=Logo InventarisRPL">
    </div>
  </div>
</footer>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form[action="{{ route('pinjam') }}"]');
    if (form) {
        form.addEventListener('submit', function (e) {
            const confirmed = confirm('Apakah Anda yakin ingin meminjam laptop ini?');
            if (!confirmed) {
                e.preventDefault();
            }
        });
    }
});
</script>
</body>
</html>