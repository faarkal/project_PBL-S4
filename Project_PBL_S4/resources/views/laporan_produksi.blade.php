<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Produksi - Balai Usaha Perikanan Genteng</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
            <li>
                <div class="hamburger-menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <a href="#">HOME</a>
            </li>
            <li><a href="#">PROFILE</a></li>
            <li class="dropdown">
                <a href="#" class="dropbtn" onclick="toggleDropdown()">LAPORAN</a>
                <div id="dropdownMenu" class="dropdown-content">
                    <a href="{{ route('laporan.produksi') }}">Laporan Produksi</a>
                    <a href="#">Laporan Penjualan</a>
                    <a href="#">Laporan Induk</a>
                </div>
            </li>
            <li><a href="#">HASIL</a></li>
            <li><a href="#">NOTA</a></li>
        </ul>
    </nav>


    <main class="full-screen-form">
        <div class="form-container">
            <h2>Laporan Produksi Bibit Ikan</h2>
            <form action="{{ route('laporan.produksi.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="jenis_bibit">Jenis Bibit Ikan:</label>
                    <input type="text" id="jenis_bibit" name="jenis_bibit" required>
                </div>

                <div class="form-group">
                    <label for="bulan_lahir">Bulan Lahir Bibit:</label>
                    <input type="month" id="bulan_lahir" name="bulan_lahir" required>
                </div>

                <div class="form-group">
                    <label for="jumlah_bibit">Jumlah Bibit:</label>
                    <input type="number" id="jumlah_bibit" name="jumlah_bibit" min="1" required>
                </div>

                <div class="form-group">
                    <label for="harga_bibit">Harga Bibit (Rp):</label>
                    <input type="number" id="harga_bibit" name="harga_bibit" min="0" required>
                </div>

                <button type="submit" class="btn-submit">
                    Simpan Laporan
                </button>
            </form>
        </div>
    </main>

    <section class="info-perikanan">
        <div class="info-kiri">
            <div class="perikanan-header">
                <div class="logo">
                    <img src="{{ asset('images/kementrian_perikanan.png') }}" alt="Logo Ikan">
                </div>
                <h2>PERIKANAN</h2>
            </div>
                <p><strong>DINAS PERIKANAN BANYUWANGI</strong></p>
                <p>UP: Balai Benih Ikan Genteng<br>Jl. KH. Agus Salim No.106, Lingkungan Cuking RW, Mojopanggung, Kec. Banyuwangi, Kabupaten Banyuwangi, Jawa Timur 68424.</p>
                <p>Telephone:</p>
                <p>Email:</p>
            <div class="social-icons">
                <a href="#" style="color: #c32aa3;"><i class="fab fa-instagram"></i></a>
                <a href="#" style="color: #ff0000;"><i class="fab fa-youtube"></i></a>
                <a href="#" style="color: #1da1f2;"><i class="fab fa-twitter"></i></a>
                <a href="#" style="color: #3b5998;"><i class="fab fa-facebook"></i></a>
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

    <div id="popup" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closePopup()">&times;</span>
            <h3>Pilih Laporan</h3>
            <ul>
                <li><a href="#">Laporan Produksi</a></li>
                <li><a href="#">Laporan Penjualan</a></li>
                <li><a href="#">Laporan Induk</a></li>
            </ul>
        </div>
    </div>
    <br>


    <footer>
        <p style="display: flex; justify-content: center; align-items: center; font-size: 0.8em;">
            Copyright © 2025 Perikanan Kab. Banyuwangi - All rights reserved. | Create by PBL kelompok1.
        </p>
    </footer>

    <!-- Script untuk dropdown navigasi -->
    <script>
    function toggleDropdown() {
        const dropdownMenu = document.getElementById("dropdownMenu");
        if (dropdownMenu.style.display === "block") {
            dropdownMenu.style.display = "none";
        } else {
            dropdownMenu.style.display = "block";
        }
    }

    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            const dropdowns = document.getElementsByClassName("dropdown-content");
            for (let i = 0; i < dropdowns.length; i++) {
                const openDropdown = dropdowns[i];
                if (openDropdown.style.display === "block") {
                    openDropdown.style.display = "none";
                }
            }
        }
    }
    </script>
</body>
</html>
