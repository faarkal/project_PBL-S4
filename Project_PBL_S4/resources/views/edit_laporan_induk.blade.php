<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Induk - Balai Usaha Perikanan Genteng</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeSidebar()">&times;</a>
        <a href="#"><i class="fas fa-sign-in-alt"></i> Login</a>
        <a href="{{ route('jenis-ikan.create') }}"><i class="fa fa-plus"></i> Tambahkan Ikan</a>
        <a href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <!-- Overlay -->
    <div id="overlay" class="overlay" onclick="closeSidebar()"></div>

    <main class="w-full max-w-5xl bg-white p-10 rounded-xl shadow-lg">
        <h2 class="text-3xl font-bold mb-8 text-center text-gray-700">Edit Data Induk Bibit Ikan</h2>

        <form action="{{ route('laporan.induk.update', $laporanInduk->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="nama_induk" class="block mb-1 font-medium text-gray-700">Nama Induk</label>
                <select id="nama_induk" name="nama_induk" required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    <option value="">Pilih Nama Induk</option>
                    <option value="TOMBRO" {{ $laporanInduk->nama_induk == 'TOMBRO' ? 'selected' : '' }}>TOMBRO</option>
                    <option value="NILA GIFT" {{ $laporanInduk->nama_induk == 'NILA GIFT' ? 'selected' : '' }}>NILA GIFT</option>
                    <option value="NILA MERAH" {{ $laporanInduk->nama_induk == 'NILA MERAH' ? 'selected' : '' }}>NILA MERAH</option>
                    <option value="KOI" {{ $laporanInduk->nama_induk == 'KOI' ? 'selected' : '' }}>KOI</option>
                </select>
            </div>

            <div>
                <label for="jenis_kelamin" class="block mb-1 font-medium text-gray-700">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin" required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    <option value="">Pilih</option>
                    <option value="Jantan" {{ $laporanInduk->jenis_kelamin == 'Jantan' ? 'selected' : '' }}>Jantan</option>
                    <option value="Betina" {{ $laporanInduk->jenis_kelamin == 'Betina' ? 'selected' : '' }}>Betina</option>
                </select>
            </div>

            <div>
                <label for="asal_induk" class="block mb-1 font-medium text-gray-700">Asal Induk</label>
                <select id="asal_induk" name="asal_induk" required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    <option value="">Asal Induk</option>
                    <option value="Dinas" {{ $laporanInduk->asal_induk == 'Dinas' ? 'selected' : '' }}>Dinas</option>
                    <option value="Balai" {{ $laporanInduk->asal_induk == 'Balai' ? 'selected' : '' }}>Balai</option>
                </select>
            </div>

            <div>
                <label for="jumlah" class="block mb-1 font-medium text-gray-700">Jumlah</label>
                <input type="number" id="jumlah" name="jumlah" value="{{ $laporanInduk->jumlah }}" required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" />
            </div>

            <div>
                <label for="tanggal_masuk" class="block mb-1 font-medium text-gray-700">Tanggal Masuk</label>
                <input type="date" id="tanggal_masuk" name="tanggal_masuk" value="{{ $laporanInduk->tanggal_masuk }}" required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" />
            </div>

            <div class="flex justify-end gap-4">
                <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded-lg transition">
                    Perbarui
                </button>
                <a href="{{ route('hasil.laporan.induk') }}"
                    class="bg-gray-400 hover:bg-gray-500 text-white font-semibold py-2 px-6 rounded-lg transition">
                    Batal
                </a>
            </div>
        </form>
    </main>

</body>
</html>
