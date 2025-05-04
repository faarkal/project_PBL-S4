<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tambah Jenis Ikan - Balai Usaha Perikanan Genteng</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-md mx-auto bg-white rounded-lg shadow-md overflow-hidden p-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Jenis Ikan Baru</h1>
            
            <form id="tambahIkanForm" class="space-y-4">
                @csrf
                <div>
                    <label for="nama_ikan" class="block text-sm font-medium text-gray-700">Nama Jenis Ikan</label>
                    <input type="text" id="nama_ikan" name="nama_ikan" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border">
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ route('home') }}" class="btn btn-secondary me-md-2">
                        <i class="fas fa-home"></i> Kembali ke Home
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Tambahkan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('tambahIkanForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = {
                nama_ikan: document.getElementById('nama_ikan').value
            };

            fetch('/jenis-ikan', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
                body: JSON.stringify(formData)
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(err => { throw err; });
                }
                return response.json();
            })
            .then(data => {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: data.message,
                    confirmButtonText: 'OK'
                }).then(() => {
                    document.getElementById('nama_ikan').value = '';
                });
            })
            .catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: error.message || 'Terjadi kesalahan',
                    confirmButtonText: 'OK'
                });
                console.error('Error:', error);
            });
        });
    </script>
</body>
</html>