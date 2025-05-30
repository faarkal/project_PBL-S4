<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Induk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <!-- Form Container -->
    <main class="w-full max-w-5xl bg-white p-10 rounded-xl shadow-lg">
        <h2 class="text-3xl font-bold mb-8 text-center text-gray-700">Tambah Data Induk Bibit Ikan</h2>

        <form action="{{ route('laporan.induk.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="nama_induk" class="block mb-1 font-medium text-gray-700">Nama Induk</label>
                <select id="nama_induk" name="nama_induk" required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    <option value="">Pilih Nama Induk</option>
                    <option value="TOMBRO">TOMBRO</option>
                    <option value="NILA GIFT">NILA GIFT</option>
                    <option value="NILA MERAH">NILA MERAH</option>
                    <option value="KOI">KOI</option>
                </select>
            </div>

            <div>
                <label for="jenis_kelamin" class="block mb-1 font-medium text-gray-700">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin" required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    <option value="">Pilih</option>
                    <option value="Jantan">Jantan</option>
                    <option value="Betina">Betina</option>
                </select>
            </div>

            <div>
                <label for="asal_induk" class="block mb-1 font-medium text-gray-700">Asal Induk</label>
                <select id="asal_induk" name="asal_induk" required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    <option value="">Asal Induk</option>
                    <option value="Dinas">Dinas</option>
                    <option value="Balai">Balai</option>
                </select>
            </div>

            <div>
                <label for="jumlah" class="block mb-1 font-medium text-gray-700">Jumlah</label>
                <input type="number" id="jumlah" name="jumlah" required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" />
            </div>

            <div>
                <label for="tanggal_masuk" class="block mb-1 font-medium text-gray-700">Tanggal Masuk</label>
                <input type="date" id="tanggal_masuk" name="tanggal_masuk" required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" />
            </div>

            <div class="flex justify-end gap-4">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition">
                    Simpan
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
