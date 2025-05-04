<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Induk</title>
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
            <li><a href="{{ route('home') }}">HOME</a></li>
            <li><a href="#">PROFILE</a></li>
            <li class="dropdown">
                <a href="#" class="dropbtn" onclick="toggleDropdown('laporanMenu')">LAPORAN</a>
                <div id="laporanMenu" class="dropdown-content">
                    <a href="{{ route('laporan.produksi') }}">Laporan Produksi</a>
                    <a href="#">Laporan Penjualan</a>
                    <a href="{{ route('hasil.laporan.induk') }}">Laporan Induk</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="#" class="dropbtn" onclick="toggleDropdown('hasilMenu')">HASIL</a>
                <div id="hasilMenu" class="dropdown-content">
                    <a href="{{ route('hasil.laporan.produksi') }}">Hasil Laporan Produksi</a>
                    <a href="#">Hasil Laporan Penjualan</a>
                    <a href="#">Hasil Laporan Induk</a>
                </div>
            </li>
            <li><a href="/nota">NOTA</a></li>
        </ul>
    </nav>

    <main>
        <div class="form-container">
            <h2>Edit Data Induk Bibit Ikan</h2>

            <form action="{{ route('laporan.induk.update', $laporanInduk->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama_induk">Nama Induk</label>
                    <select name="nama_induk" id="nama_induk" required>
                        <option value="">Pilih Nama Induk</option>
                        <option value="TOMBRO" {{ $laporanInduk->nama_induk == 'TOMBRO' ? 'selected' : '' }}>TOMBRO</option>
                        <option value="NILA GIFT" {{ $laporanInduk->nama_induk == 'NILA GIFT' ? 'selected' : '' }}>NILA GIFT</option>
                        <option value="NILA MERAH" {{ $laporanInduk->nama_induk == 'NILA MERAH' ? 'selected' : '' }}>NILA MERAH</option>
                        <option value="KOI" {{ $laporanInduk->nama_induk == 'KOI' ? 'selected' : '' }}>KOI</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" required>
                        <option value="">Pilih</option>
                        <option value="Jantan" {{ $laporanInduk->jenis_kelamin == 'Jantan' ? 'selected' : '' }}>Jantan</option>
                        <option value="Betina" {{ $laporanInduk->jenis_kelamin == 'Betina' ? 'selected' : '' }}>Betina</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="asal_induk">Asal Induk</label>
                    <select name="asal_induk" id="asal_induk" required>
                        <option value="">Asal Induk</option>
                        <option value="Dinas" {{ $laporanInduk->asal_induk == 'Dinas' ? 'selected' : '' }}>Dinas</option>
                        <option value="Balai" {{ $laporanInduk->asal_induk == 'Balai' ? 'selected' : '' }}>Balai</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" name="jumlah" id="jumlah" value="{{ $laporanInduk->jumlah }}" required>
                </div>

                <div class="form-group">
                    <label for="tanggal_masuk">Tanggal Masuk</label>
                    <input type="date" name="tanggal_masuk" id="tanggal_masuk" value="{{ $laporanInduk->tanggal_masuk }}" required>
                </div>

                <button type="submit" class="btn-submit">Perbarui</button>
                <a href="{{ route('hasil.laporan.induk') }}" class="btn-cancel">Batal</a>
            </form>
        </div>
    </main>
</body>
</html>
