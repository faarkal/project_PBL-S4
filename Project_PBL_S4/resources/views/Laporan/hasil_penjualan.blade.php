<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Hasil Penjualan - Balai Usaha Perikanan Genteng</title>
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
            <li><a href="#">HOME</a></li>
            <li><a href="#">PROFILE</a></li>
            <li><a href="#">LAPORAN</a></li>
            <li class="dropdown">
                <a href="#" class="dropbtn">HASIL</a>
                <div class="dropdown-content">
                    <a href="{{ route('hasil-penjualan') }}">Hasil Penjualan</a>

                </div>
            </li>
            <li><a href="#">NOTA</a></li>
        </ul>
    </nav>

    <main>


        <h3>Data Pemesanan</h3>
<table id="tabelPemesanan" style="width:100%">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Pemesan</th>
            <th>No. Pemesanan</th>
            <th>Jenis Ikan</th>
        </tr>
    </thead>
    <tbody>
        <script>
            let noUrut = 1;

            function tambahPemesanan(event) {
                event.preventDefault();

                const nama = document.getElementById('namaPemesan').value;
                const nomor = document.getElementById('nomorPemesanan').value;
                const jenis = document.getElementById('jenisIkan').value;

                const tabel = document.getElementById('tabelPemesanan').getElementsByTagName('tbody')[0];
                const baris = tabel.insertRow();

                baris.insertCell(0).innerText = noUrut++;
                baris.insertCell(1).innerText = nama;
                baris.insertCell(2).innerText = nomor;
                baris.insertCell(3).innerText = jenis;

                document.getElementById('formPemesanan').reset();
            }
        </script>
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

    <div id="dropdownMenu" class="dropdown-content">

        <a href="{{ route('hasil-penjualan') }}">Hasil Penjualan</a>
    </div>




</main>
<br>
<footer>
    <p style="width:100%;text-align: center; display: flex; justify-content: center; align-items: center; font-size: 0.8em;">
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
    document.querySelector('.dropbtn').addEventListener('mouseover', function () {
    const dropdown = document.querySelector('.dropdown-content');
    dropdown.style.display = 'block';
    });

    document.querySelector('.dropbtn').addEventListener('mouseout', function () {
    const dropdown = document.querySelector('.dropdown-content');
    setTimeout(() => {
        dropdown.style.display = 'none';
    }, 300);
    });

    document.querySelector('.dropdown-content').addEventListener('mouseover', function () {
    this.style.display = 'block';
    });

    document.querySelector('.dropdown-content').addEventListener('mouseout', function () {
    setTimeout(() => {
        this.style.display = 'none';
    }, 300);
    });



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
</body>
</html>


