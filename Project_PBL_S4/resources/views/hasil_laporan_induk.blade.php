{{-- resources/views/hasil_laporan_induk.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Laporan Induk - Balai Usaha Perikanan Genteng</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
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
        <div>
            <h2>Hasil Laporan Induk Bibit Ikan</h2>

            <div class="table-top">
                <div>
                    <a href="{{ route('laporan.induk') }}" class="link-add-data">Tambah Data</a>
                </div>
                <div class="table-search">
                    Search:
                    <form action="{{ route('hasil.laporan.induk') }}" method="GET">
                        <input type="text" name="search" placeholder="Cari..." value="{{ request('search') }}">
                        <button type="submit">Cari</button>
                    </form>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Induk</th>
                        <th>Jenis Kelamin</th>
                        <th>Asal Induk</th>
                        <th>Jumlah</th>
                        <th>Tanggal Masuk</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($message))
                        <tr>
                            <td colspan="7" class="text-center">{{ $message }}</td>
                        </tr>
                    @else
                        @foreach($laporanInduk as $key => $induk)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $induk->nama_induk }}</td>
                                <td>{{ $induk->jenis_kelamin }}</td>
                                <td>{{ $induk->asal_induk }}</td>
                                <td>{{ $induk->jumlah }}</td>
                                <td>{{ $induk->tanggal_masuk }}</td>
                                <td>
                                    <form id="delete-form-{{ $induk->id }}" action="{{ route('laporan.induk.delete', $induk->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn-delete" onclick="confirmDelete({{ $induk->id }})">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>

                                    <a href="{{ route('laporan.induk.edit', $induk->id) }}" class="btn-edit">
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

        </div>
    </main>


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

</body>
</html>
