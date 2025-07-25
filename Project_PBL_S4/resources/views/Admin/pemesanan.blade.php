<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Balai Usaha Perikanan Genteng</title>
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
                    <a href="{{ route('laporan.induk.store') }}">Pengelolaan Induk</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="#" class="dropbtn" onclick="toggleDropdown('hasilMenu')">HASIL</a>
                <div id="hasilMenu" class="dropdown-content">
                    <a href="{{ route('hasil.laporan.produksi') }}">Hasil Pengelolaan Produksi</a>
                    <a href="#">Hasil Pengelolaan Penjualan</a>
                    <a href="{{ route('laporan.induk.store') }}">Hasil Pengelolaan Induk</a>
                </div>
            </li>
            <li><a href="">PEMESANAN</a></li>
            <li><a href="/pelaporan">PELAPORAN</a></li>

        </ul>
    </nav>

<main>
    <section class="simple-form">
        <h2>Form Pemesanan Bibit Ikan</h2>
        <form id="formPemesanan" class="pemesanan-form" action="{{ route('pemesanan.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_pembeli">Nama Pembeli:</label>
                <input type="text" id="nama_pembeli" name="nama_pembeli" required
                       value="{{ old('nama_pembeli') }}">
                @error('nama_pembeli')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="no_telepon">Nomor Telepon:</label>
                <input type="tel" id="no_telepon" name="no_telepon" required
                       value="{{ old('no_telepon') }}">
                @error('no_telepon')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group" style="margin-bottom:15px;">
                <label for="jenis_ikan" style="margin-bottom:6px;">Jenis Bibit Ikan:</label>
                <select name="jenis_ikan" id="jenis_ikan" style="width:1260px; padding:10px; font-size:15px;" required>
                    <option value="">-- Pilih Jenis Ikan --</option>
                    @foreach(App\Models\JenisIkan::all() as $ikan)
                        <option value="{{ $ikan->id }}" {{ old('jenis_ikan') == $ikan->id ? 'selected' : '' }}>
                            {{ $ikan->nama_ikan }}
                        </option>
                    @endforeach
                </select>
                @error('jenis_ikan')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="jumlah_bibit">Jumlah Bibit:</label>
                <input type="number" id="jumlah_bibit" name="jumlah_bibit" min="1" required
                       value="{{ old('jumlah_bibit') }}">
                @error('jumlah_bibit')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn-submit">Simpan Pemesanan</button>
            </div>
        </form>
    </section>
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
