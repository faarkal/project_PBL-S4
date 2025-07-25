<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelaporan - Balai Usaha Perikanan Genteng</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   
</head>
<body>
    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeSidebar()">&times;</a>
        <a href="#"><i class="fas fa-sign-in-alt"></i> Login</a>
        <a href="{{ route('jenis-ikan.create') }}"><i class="fa fa-plus"></i> Tambahkan Ikan</a>
        <a href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <!-- Overlay -->
    <div id="overlay" class="overlay" onclick="closeSidebar()"></div>

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
                <div class="hamburger-menu" onclick="openSidebar()">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <a href="{{ route('home') }}">HOME</a>
            </li>
            <li>
                <a href="#">PROFILE</a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropbtn" onclick="toggleDropdown('laporanMenu')">PENGELOLAAN</a>
                <div id="laporanMenu" class="dropdown-content">
                    <a href="{{ route('laporan.produksi') }}">Pengelolaan Produksi</a>
                    <a href="#">Pengelolaan Induk</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="#" class="dropbtn" onclick="toggleDropdown('hasilMenu')">HASIL</a>
                <div id="hasilMenu" class="dropdown-content">
                    <a href="{{ route('hasil.laporan.produksi') }}">Hasil Pengelolaan Produksi</a>
                    <a href="#">Hasil Pengelolaan Penjualan</a>
                    <a href="#">Hasil Pengelolaan Induk</a>
                </div>
            </li>
            <li><a href="">PEMESANAN</a></li>
            <li><a href="/pelaporan">PELAPORAN</a></li>
            
        </ul>
    </nav>

    <div class="report-container">
        <div class="report-header">
            <div class="report-title">LAPORAN BULANAN PRODUKSI BENIH IKAN</div>
        <div class="month-selection">
            <label for="monthSelect">Pilih Bulan:</label>
            <select id="monthSelect" class="month-select" onchange="updateReportMonth()">
                <option value="Januari">Januari</option>
                <option value="Februari">Februari</option>
                <option value="Maret" selected>Maret</option>
                <option value="April">April</option>
                <option value="Mei">Mei</option>
                <option value="Juni">Juni</option>
                <option value="Juli">Juli</option>
                <option value="Agustus">Agustus</option>
                <option value="September">September</option>
                <option value="Oktober">Oktober</option>
                <option value="November">November</option>
                <option value="Desember">Desember</option>
            </select>
        </div>
    </div>

        <table class="report-table">
            <thead>
                <tr>
                    <th rowspan="2">NO</th>
                    <th rowspan="2">JENIS IKAN</th>
                    <th colspan="2">SISA PRODUKSI BULAN LALU</th>
                    <th colspan="2">PRODUKSI BULAN INI</th>
                    <th colspan="2">JUMLAH TOTAL</th>
                    <th colspan="8">PENGURANGAN BENIH BULAN INI</th>
                    <th colspan="2">SISA BENIH AKHIR BULAN INI</th>
                </tr>
                <tr>
                    <th>Ukuran (Cm)</th>
                    <th>Jumlah (ekor)</th>
                    <th>Ukuran (cm)</th>
                    <th>Jumlah (ekor)</th>
                    <th>Ukuran (cm)</th>
                    <th>Jumlah (ekor)</th>
                    <th colspan="4">TERJUAL</th>
                    <th colspan="2">RESTOKING</th>
                    <th colspan="2">MATI</th>
                    <th>Ukuran (cm)</th>
                    <th>Jumlah (ekor)</th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Ukuran (cm)</th>
                    <th>Jumlah (ekor)</th>
                    <th>Harga Satuan (Rp)</th>
                    <th>Jumlah (Rp)</th>
                    <th>Ukuran (cm)</th>
                    <th>Jumlah (ekor)</th>
                    <th>Ukuran (cm)</th>
                    <th>Jumlah (ekor)</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($laporanProduksi as $key => $laporan)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $laporan->jenis_bibit }}</td>
                    
                    <!-- Sisa Produksi Bulan Lalu -->
                    <td>{{ $laporan->ukuran_ikan }}</td>
                    <td>{{ number_format($laporan->jumlah_bibit, 0, ',', '.') }}</td>
                    
                    <!-- Produksi Bulan Ini -->
                    <td>{{ $laporan->ukuran_ikan }}</td>
                    <td>{{ number_format($laporan->restocking, 0, ',', '.') }}</td>
                    
                    <!-- Jumlah Total -->
                    <td>{{ $laporan->ukuran_ikan }}</td>
                    <td>{{ number_format($laporan->jumlah_bibit + $laporan->restocking, 0, ',', '.') }}</td>
                    
                    <!-- Terjual -->
                    <td>{{ $laporan->ukuran_ikan }}</td>
                    <td>{{ number_format($laporan->jumlah_bibit * ($laporan->kematian_ikan/100), 0, ',', '.') }}</td>
                    <td>{{ number_format($laporan->harga_bibit, 0, ',', '.') }}</td>
                    <td>{{ number_format(($laporan->jumlah_bibit * ($laporan->kematian_ikan/100)) * $laporan->harga_bibit, 0, ',', '.') }}</td>
                    
                    <!-- Restoking -->
                    <td>{{ $laporan->ukuran_ikan }}</td>
                    <td>{{ number_format($laporan->restocking, 0, ',', '.') }}</td>
                    
                    <!-- Mati -->
                    <td>{{ $laporan->ukuran_ikan }}</td>
                    <td>{{ number_format($laporan->jumlah_bibit * ($laporan->kematian_ikan/100), 0, ',', '.') }}</td>
                    
                    <!-- Sisa Benih Akhir -->
                    <td>{{ $laporan->ukuran_ikan }}</td>
                    <td>{{ number_format($laporan->jumlah_bibit_akhir, 0, ',', '.') }}</td>
                </tr>
                @endforeach
                
                <!-- Total Row -->
                <tr style="font-weight: bold;">
                    <td colspan="3">JUMLAH</td>
                    <td>{{ number_format($laporanProduksi->sum('jumlah_bibit'), 0, ',', '.') }}</td>
                    <td></td>
                    <td>{{ number_format($laporanProduksi->sum('restocking'), 0, ',', '.') }}</td>
                    <td></td>
                    <td>{{ number_format($laporanProduksi->sum('jumlah_bibit') + $laporanProduksi->sum('restocking'), 0, ',', '.') }}</td>
                    <td></td>
                    <td>{{ number_format($laporanProduksi->sum(function($item) { 
                            return $item->jumlah_bibit * ($item->kematian_ikan/100); 
                        }), 0, ',', '.') }}</td>
                    <td></td>
                    <td>{{ number_format($laporanProduksi->sum(function($item) { 
                            return ($item->jumlah_bibit * ($item->kematian_ikan/100)) * $item->harga_bibit; 
                        }), 0, ',', '.') }}</td>
                    <td></td>
                    <td>{{ number_format($laporanProduksi->sum('restocking'), 0, ',', '.') }}</td>
                    <td></td>
                    <td>{{ number_format($laporanProduksi->sum(function($item) { 
                            return $item->jumlah_bibit * ($item->kematian_ikan/100); 
                        }), 0, ',', '.') }}</td>
                    <td></td>
                    <td>{{ number_format($laporanProduksi->sum('jumlah_bibit_akhir'), 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
    </div>

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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        // Fungsi untuk membuka sidebar
        function openSidebar() {
            document.getElementById("mySidebar").style.width = "250px";
            document.getElementById("overlay").style.display = "block";
        }

        // Fungsi untuk menutup sidebar
        function closeSidebar() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("overlay").style.display = "none";
        }

        // Tutup sidebar jika mengklik di luar sidebar
        window.onclick = function(event) {
            const sidebar = document.getElementById("mySidebar");
            const overlay = document.getElementById("overlay");
            
            if (event.target === overlay) {
                closeSidebar();
            }
            
            // Kode untuk dropdown menu yang sudah ada
            const menuContent = document.getElementById("hamburgerMenuContent");
            if (!event.target.closest("nav ul li a[onclick='toggleHamburgerMenu()']")) {
                if (menuContent) menuContent.style.display = "none";
            }
            
            const dropdowns = document.querySelectorAll('.dropdown-content');
            dropdowns.forEach(function(dropdown) {
                if (!event.target.closest('.dropbtn')) {
                    dropdown.style.display = "none"; 
                }
            });
        }

        // Fungsi untuk toggle dropdown (tetap sama)
        function toggleDropdown(menuId) {
            const menu = document.getElementById(menuId);

            if (menu.style.display === "block") {
                menu.style.display = "none";
            } else {
                const allDropdowns = document.querySelectorAll('.dropdown-content');
                allDropdowns.forEach(function(dropdown) {
                    dropdown.style.display = "none"; 
                });
                menu.style.display = "block"; 
            }
        }

        // Mencegah event bubbling pada dropdown items
        document.querySelectorAll('.dropdown-content a').forEach(function(item) {
            item.addEventListener('click', function(event) {
                event.stopPropagation();
            });
        });
    </script>
</body>
</html>