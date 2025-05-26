@extends('layouts.app')

@section('content')
    <main>
        <section class="main-content w-full">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">
                            Laporan Hasil Penjualan
                        </h6>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTambah">
                            <i class="fa-solid fa-plus"></i>
                            <span>Tambah Data</span>
                        </button>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-striped datatable" id="dataTable">
                                <thead class="table-success">
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Ikan</th>
                                        <th>Stok Benih Ikan</th>
                                        <th>Angka Kehidupan</th>
                                        <th>Angka Kematian</th>
                                        <th>Ukuran</th>
                                        <th>Aksi</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penjualans as $index => $penjualan)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $penjualan->jenis_ikan }}</td>
                                            <td>{{ $penjualan->stok }} ekor</td>
                                            <td>{{ $penjualan->angka_kehidupan }}%</td>
                                            <td>{{ $penjualan->angka_kematian }}%</td>
                                            <td>{{ $penjualan->ukuran }} cm</td>
                                            <td>
                                                <button class="btn btn-success btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#modalEdit"
                                                    onclick="editData('{{ $penjualan->id }}', '{{ $penjualan->jenis_ikan }}', '{{ $penjualan->stok }}', '{{ $penjualan->angka_kehidupan }}', '{{ $penjualan->angka_kematian }}', '{{ $penjualan->ukuran }}')">
                                                    Edit
                                                </button>
                                                <form action="{{ route('hasil.destroy', $penjualan->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus?')">Hapus</button>
                                                </form>
                                            </td>
                                            <td>{{ $penjualan->total }} ekor</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Modal Tambah Data --}}
            <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ route('hasil.store') }}" method="POST">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTambahLabel">Tambah Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label>Jenis Ikan</label>
                                    <input type="text" name="jenis_ikan" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Stok Benih Ikan</label>
                                    <input type="number" name="stok" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Angka Kehidupan (%)</label>
                                    <input type="number" name="angka_kehidupan" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Angka Kematian (%)</label>
                                    <input type="number" name="angka_kematian" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Ukuran (cm)</label>
                                    <input type="text" name="ukuran" class="form-control" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Modal Edit Data --}}
            <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form id="formEdit" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalEditLabel">Edit Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="editId" name="id">
                                <div class="mb-3">
                                    <label>Jenis Ikan</label>
                                    <input type="text" id="editJenisIkan" name="jenis_ikan" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Stok Benih Ikan</label>
                                    <input type="number" id="editStok" name="stok" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Angka Kehidupan (%)</label>
                                    <input type="number" id="editKehidupan" name="angka_kehidupan" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Angka Kematian (%)</label>
                                    <input type="number" id="editKematian" name="angka_kematian" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Ukuran (cm)</label>
                                    <input type="text" id="editUkuran" name="ukuran" class="form-control" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </section>
    </main>
@endsection

@push('scripts')
    <script>
        function editData(id, jenis_ikan, stok, kehidupan, kematian, ukuran) {
            document.getElementById('editId').value = id;
            document.getElementById('editJenisIkan').value = jenis_ikan;
            document.getElementById('editStok').value = stok;
            document.getElementById('editKehidupan').value = kehidupan;
            document.getElementById('editKematian').value = kematian;
            document.getElementById('editUkuran').value = ukuran;

            // Set action formEdit ke route update
            document.getElementById('formEdit').action = '/penjualan/' + id;
        }

        $(document).ready(function() {
            $('.datatable').DataTable();
        });
    </script>
@endpush
