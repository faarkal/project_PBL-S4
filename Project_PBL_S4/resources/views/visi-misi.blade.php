<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visi dan Misi - Balai Usaha Perikanan Genteng</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #00BFFF;
            padding: 20px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        header img {
            height: 60px;
        }
        header h1 {
            font-size: 24px;
            margin: 0;
            text-align: center;
            flex-grow: 1;
        }
        nav {
            background-color: #007acc;
            padding: 10px 0;
        }
        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            margin: 0;
            padding: 0;
        }
        nav ul li {
            margin: 0 15px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .visi-misi {
            background-color: #e0e0e0;
            padding: 40px 20px;
            text-align: center;
        }
        .visi-misi h2 {
            font-size: 28px;
            margin-bottom: 15px;
        }
        .visi-misi p {
            font-size: 18px;
            max-width: 800px;
            margin: 0 auto 30px;
        }
        .visi-misi ol {
            text-align: left;
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.8;
        }

        footer {
            background-color: #00BFFF;
            color: black;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

    <header>
        <img src="{{ asset('images/logo-kabupaten-banyuwangi.png') }}" alt="Logo Banyuwangi">
        <h1>BALAI USAHA PERIKANAN GENTENG</h1>
        <img src="{{ asset('images/kementrian_perikanan.png') }}" alt="Logo Kementerian Perikanan">
    </header>

    <nav>
        <ul>
            <li><a href="/">BERANDA</a></li>
            <li><a href="#">PROFIL</a></li>
            <li><a href="#">LAPORAN</a></li>
            <li><a href="#">HASIL</a></li>
            <li><a href="#">NOTA</a></li>
        </ul>
    </nav>

    <section class="visi-misi">
        <h2>VISI</h2>
        <p>
            <strong>Visi Dinas Kelautan dan Perikanan Banyuwangi</strong><br>
            <em>“Terwujudnya usaha kelautan dan perikanan yang maju dan lestari untuk kesejahteraan dan kemandirian masyarakat.”</em>
        </p>

        <hr style="margin: 40px auto; width: 60%; border: 1px solid #aaa;">

        <h2>MISI</h2>
        <p style="text-align: left;"><strong>Misi Dinas Kelautan dan Perikanan Banyuwangi:</strong></p>
        <ol>
            <li>Mengelola perikanan tangkap secara lestari dan berkelanjutan.</li>
            <li>Mengembangkan usaha budidaya perikanan yang maju dan mandiri.</li>
            <li>Meningkatkan kualitas dan nilai tambah produk perikanan.</li>
            <li>Meningkatkan kapasitas SDM pelaku utama dan pelaku usaha perikanan.</li>
            <li>Memberikan kepastian publik yang cepat, mudah dan transparan.</li>
            <li>Mewujudkan tata kelola pemerintahan yang bersih dan profesional.</li>
        </ol>
    </section>

    <footer>
        <p>&copy; 2025 Perikanan Kab. Banyuwangi - All rights reserved. | Created by PBL Kelompok 1</p>
    </footer>

</body>
</html>
