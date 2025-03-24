<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balai Usaha Perikanan Genteng</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <div class="header-content">
            <div class="logo">
                <img src="{{ asset('images/logo-kabupaten-banyuwangi.png') }}" alt="Logo">
            </div>
            <h1>BALAI USAHA PERIKANAN GENTENG</h1>
            <div class="logo">
                <img src="{{ asset('images/kementrian_perikanan.png') }}" alt="Logo Ikan">
            </div>
        </div>
    </header>

    <nav>
        <ul>
            <li><a href="#">HOME</a></li>
            <li><a href="#">PROFILE</a></li>
            <li><a href="#">LAPORAN</a></li>
            <li><a href="#">HASIL</a></li>
            <li><a href="#">NOTA</a></li>
        </ul>
    </nav>

    <main>
        <section class="main-content">
            <div class="kepala-dinas">
                <h2>KEPALA DINAS</h2>
                <div class="foto-container">
                    <div class="foto-placeholder">FOTO</div>
                    <p>Nama Menteri<br>Menteri Kelautan dan Perikanan</p>
                </div>
            </div>
        </section>

        <section class="info-perikanan">
            <div class="info-kiri">
                <h2>PERIKANAN</h2>
                <div class="logo">
                    <img src="{{ asset('images/kementrian_perikanan.png') }}" alt="Logo Ikan">
                </div>
                <p><strong>DINAS PERIKANAN BANYUWANGI</strong></p>
                <p>UP: Balai Benih Ikan Genteng<br>Jl. KH. Agus Salim No.106, Lingkungan Cuking RW, Mojopanggung, Kec. Banyuwangi, Kabupaten Banyuwangi, Jawa Timur 68424.</p>
                <p>Telephone:</p>
                <p>Email:</p>
                <div class="social-icons">
                    <a href="#"><img src="{{ asset('images/Logo-Instagram.png') }}" alt="Instagram"></a>
                    <a href="#"><img src="{{ asset('images/logo_yt.webp') }}" alt="YouTube"></a>
                    <a href="#"><img src="{{ asset('images/logo_x.png') }}" alt="X"></a>
                    <a href="#"><img src="{{ asset('images/logo_fb.png') }}" alt="Facebook"></a>
                </div>
            </div>

            <div class="info-kanan">
                <h3>HARI KUNJUNGAN</h3>
                <ul>
                    <li>Senin: 07:00-17:00</li>
                    <li>Selasa: 07:00-17:00</li>
                    <li>Rabu: 07:00-17:00</li>
                    <li>Kamis: 07:00-17:00</li>
                    <li>Jumat: Tutup</li>
                    <li>Sabtu: Tutup</li>
                    <li>Minggu: 07:00-17:00</li>
                </ul>
            </div>
        </section>
    </main>

    <footer>
    <p style="display: flex; justify-content: center; align-items: center; font-size: 0.8em;">
        Copyright © 2025 Perikanan Kab. Banyuwangi - All rights reserved. | Create by kelompok1 pbl.
    </p>
    </footer>

</body>
</html>
