<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Laporan Produksi - Balai Usaha Perikanan Genteng</title>
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
                <a href="{{ route('home') }}">HOME</a>
            </li>
            <li><a href="#">PROFILE</a></li>
            <li class="dropdown">
                <a href="#" class="dropbtn" onclick="toggleDropdown('laporanMenu')">LAPORAN</a>
                <div id="laporanMenu" class="dropdown-content">
                    <a href="{{ route('laporan.produksi') }}">Laporan Produksi</a>
                    <a href="#">Laporan Penjualan</a>
                    <a href="#">Laporan Induk</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="#" class="dropbtn" onclick="toggleDropdown('hasilMenu')">HASIL</a>
                <div id="hasilMenu" class="dropdown-content">
                    <a href="{{ route('hasil.laporan.produksi') }}">Hasil Laporan Produksi</a>
                    <a href="#">Hasil Laporan Penjualan</a>
                    <a href="{{ route('hasil.laporan.induk') }}">Hasil Laporan Induk</a>
                </div>
            </li>
            <li><a href="/nota">NOTA</a></li>
        </ul>
    </nav>

    <main>
        <div>
            <h2>Hasil Laporan Produksi Bibit Ikan</h2>

            <div class="table-top">
                <div>
                    <a href="{{ route('laporan.produksi') }}" class="link-add-data">Tambah Data</a>
                </div>
                <div class="table-search">
                    Search:
                    <form action="{{ route('hasil.laporan.produksi') }}" method="GET">
                        <input type="text" name="search" placeholder="Cari..." value="{{ request('search') }}">
                        <button type="submit">Cari</button>
                    </form>
                </div>
            </div>

            <!-- Tabel untuk menampilkan hasil -->
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Jenis Bibit</th>
                        <th>Bulan Lahir</th>
                        <th>Jumlah Bibit</th>
                        <th>Harga Bibit (Rp)</th>
                        <th>Total Harga (Rp)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($message))
                        <tr>
                            <td colspan="7" class="text-center">{{ $message }}</td>
                        </tr>
                    @else
                        @foreach($laporanProduksi as $key => $laporan)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $laporan->jenis_bibit }}</td>
                                <td>{{ $laporan->bulan_lahir }}</td>
                                <td>{{ $laporan->jumlah_bibit }}</td>
                                <td>{{ number_format($laporan->harga_bibit, 0, ',', '.') }}</td>
                                <td>{{ number_format($laporan->jumlah_bibit * $laporan->harga_bibit, 0, ',', '.') }}</td>
                                <td>
                                    <form id="delete-form-{{ $laporan->id }}" action="{{ route('laporan.produksi.delete', $laporan->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="button" class="btn-delete" onclick="confirmDelete({{ $laporan->id }})">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                    <a href="{{ route('laporan.produksi.edit', $laporan->id) }}" class="btn-edit">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


            <!-- Total Harga Bibit -->
            <div class="total-harga">
                <strong>Total Harga Bibit: Rp {{ number_format($totalHargaBibit, 0, ',', '.') }}</strong>
            </div>

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


    </main>
    <br>
    <footer>
        <p style="display: flex; justify-content: center; align-items: center; font-size: 0.8em;">
            Copyright © 2025 Perikanan Kab. Banyuwangi - All rights reserved. | Create by PBL kelompok1.
        </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin ingin menghapus data ini?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
                background: '#fff',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }

        @if(session()->has('success'))
            Swal.fire({
                icon: 'success',
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 3000,
                position: 'top-end',
                toast: true,
                background: '#fff',
            });
        @endif
    </script>


    <script>
        function toggleHamburgerMenu() {
            const menuContent = document.getElementById("hamburgerMenuContent");

            if (menuContent.style.display === "block") {
                menuContent.style.display = "none";
            } else {
                menuContent.style.display = "block";
            }
        }

        window.onclick = function(event) {
            const menuContent = document.getElementById("hamburgerMenuContent");

            if (!event.target.closest("nav ul li a[onclick='toggleHamburgerMenu()']")) {
                menuContent.style.display = "none";
            }
        }
    </script>

    <script>
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

        window.onclick = function(event) {
            const dropdowns = document.querySelectorAll('.dropdown-content');

            dropdowns.forEach(function(dropdown) {
                if (!event.target.closest('.dropbtn')) {
                    dropdown.style.display = "none";
                }
            });
        }

        document.querySelectorAll('.dropdown-content a').forEach(function(item) {
            item.addEventListener('click', function(event) {
                event.stopPropagation();
            });
        });
    </script>

</body>
</html>
