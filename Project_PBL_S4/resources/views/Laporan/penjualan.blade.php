<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balai Usaha Perikanan Genteng</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        table, th, td {
            border: 1px solid #ddd;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        .btn {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.8em;
        }
        .btn-edit { background-color: #28a745; color: white; }
        .btn-delete { background-color: #dc3545; color: white; }
        .btn-tambah {
            background-color: #28a745;
            color: white;
            padding: 6px 12px;
            border-radius: 5px;
            margin-bottom: 10px;
            display: inline-block;
        }
        .search-box { float: right; margin-bottom: 10px; }
        footer {
            background-color: #00BFFF;
            color: black;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }
        .footer-left {
            width: 60%;
        }
        .footer-right {
            width: 30%;
            background-color: #eee;
            padding: 10px;
            border-radius: 10px;
        }
        .social-icons i {
            margin-right: 10px;
            font-size: 20px;
        }
        .footer-bottom {
            text-align: center;
            background-color: #dcdcdc;
            padding: 5px;
            font-size: 14px;
        }
    </style>
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

    <main>
        <h1>Ini Halaman Laporan Penjualan</h1>
        <h2>Laporan Penjualan</h2>
        <a href="#" class="btn-tambah">+ Tambah Data</a>

        <div class="search-box">
            Search: <input type="text">
        </div>

        <table style="width:100%">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Jenis Ikan</th>
                    <th>Stok Benih Ikan</th>
                    <th>Angka Kehidupan</th>
                    <th>Angka Kematian</th>
                    <th>Ukuran</th>
                    <th>Aksi</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1.</td>
                    <td>Tawes</td>
                    <td>6.000</td>
                    <td>4.000</td>
                    <td>1.000</td>
                    <td></td>
                    <td><button class="btn btn-edit">Edit</button> <button class="btn btn-delete">Delete</button></td>
                    <td></td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>Nila</td>
                    <td>10.000</td>
                    <td>8.500</td>
                    <td>1.000</td>
                    <td></td>
                    <td><button class="btn btn-edit">Edit</button> <button class="btn btn-delete">Delete</button></td>
                    <td></td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td>Mujair</td>
                    <td>8.000</td>
                    <td>6.000</td>
                    <td>2.000</td>
                    <td></td>
                    <td><button class="btn btn-edit">Edit</button> <button class="btn btn-delete">Delete</button></td>
                    <td></td>
                </tr>
                <tr>
                    <td>4.</td>
                    <td>Lele</td>
                    <td>15.000</td>
                    <td>12.000</td>
                    <td>2.000</td>
                    <td></td>
                    <td><button class="btn btn-edit">Edit</button> <button class="btn btn-delete">Delete</button></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
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


</main>
<br>
<footer>
    <p style="display: flex; justify-content: center; align-items: center; font-size: 0.8em;">
        Copyright © 2025 Perikanan Kab. Banyuwangi - All rights reserved. | Create by PBL kelompok1.
    </p>
</footer>

<script>
    function showPopup() {
        document.getElementById("popup").style.display = "block";
    }

    function closePopup() {
        document.getElementById("popup").style.display = "none";
    }

    window.onclick = function(event) {
        var popup = document.getElementById("popup");
        if (event.target == popup) {
            closePopup();
        }
    }
</script>

<script>
    document.querySelector('.dropbtn').addEventListener('click', function (event) {
        event.preventDefault(); // Mencegah default link behavior
        const dropdown = document.querySelector('.dropdown-content');

        // Toggle tampilan dropdown
        if (dropdown.style.display === 'block') {
            dropdown.style.display = 'none';
        } else {
            dropdown.style.display = 'block';
        }
    });

    // Tutup dropdown jika klik di luar
    window.addEventListener('click', function (event) {
        const dropdown = document.querySelector('.dropdown-content');

        if (!event.target.matches('.dropbtn')) {
            dropdown.style.display = 'none';
        }
    });
</script>

<script>
    function toggleHamburgerMenu() {
        const menuContent = document.getElementById("hamburgerMenuContent");

        // Toggle tampilan menu tambahan
        if (menuContent.style.display === "block") {
            menuContent.style.display = "none";
        } else {
            menuContent.style.display = "block";
        }
    }

    // Tutup hamburger menu jika pengguna mengklik di luar area
    window.onclick = function(event) {
        const menuContent = document.getElementById("hamburgerMenuContent");

        if (!event.target.closest("nav ul li a[onclick='toggleHamburgerMenu()']")) {
            menuContent.style.display = "none";
        }
    }
</script>
</body>
</html>
