<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balai Usaha Perikanan Genteng</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <style>
        table.dataTable thead th {
            background-color: #007BFF !important;
            color: white !important;
            margin-top: 10px;
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
                <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">HOME</a>
            </li>
            <li>
                <a href="{{ url('/profile') }}" class="{{ request()->is('profile') ? 'active' : '' }}">PROFILE</a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropbtn" onclick="toggleDropdown()">LAPORAN</a>
                <div id="dropdownMenu" class="dropdown-content">
                    <a href="{{ route('laporan.produksi') }}"
                        class="{{ request()->routeIs('laporan.produksi') ? 'active' : '' }}">Laporan Produksi</a>
                    <a href="{{ route('laporan.penjualan') }}"
                        class="{{ request()->routeIs('laporan.penjualan') ? 'active' : '' }}">Laporan Penjualan</a>
                    <a href="{{ route('laporan.induk') }}"
                        class="{{ request()->routeIs('laporan.induk') ? 'active' : '' }}">Laporan Induk</a>
                </div>
            </li>
            <li>
                <a href="{{ url('/hasil') }}" class="{{ request()->is('hasil') ? 'active' : '' }}">HASIL</a>
            </li>
            <li>
                <a href="{{ url('/nota') }}" class="{{ request()->is('nota') ? 'active' : '' }}">NOTA</a>
            </li>
        </ul>
    </nav>


    @yield('content')
    <section class="info-perikanan">
        <div class="info-kiri">
            <div class="perikanan-header">
                <div class="logo">
                    <img src="{{ asset('images/kementrian_perikanan.png') }}" alt="Logo Ikan">
                </div>
                <h2>PERIKANAN</h2>
            </div>
            <p><strong>DINAS PERIKANAN BANYUWANGI</strong></p>
            <p>UP: Balai Benih Ikan Genteng<br>Jl. KH. Agus Salim No.106, Lingkungan Cuking RW, Mojopanggung, Kec.
                Banyuwangi, Kabupaten Banyuwangi, Jawa Timur 68424.</p>
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
        document.querySelector('.dropbtn').addEventListener('click', function(event) {
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
        window.addEventListener('click', function(event) {
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.datatable').DataTable({
                responsive: true,
                autoWidth: false
            });
        });
    </script>

    @stack('scripts')



</body>

</html>
