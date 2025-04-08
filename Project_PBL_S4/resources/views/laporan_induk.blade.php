@extends('layouts.app')

@section('content')
<main>
    <div>
        <h2>Laporan Induk Ikan</h2>
        <form action="{{ route('laporan.induk.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_induk">Nama Induk Ikan:</label>
                <input type="text" id="nama_induk" name="nama_induk" required>
            </div>

            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <select id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="">-- Pilih --</option>
                    <option value="Jantan">Jantan</option>
                    <option value="Betina">Betina</option>
                </select>
            </div>

            <div class="form-group">
                <label for="jumlah">Jumlah Induk:</label>
                <input type="number" id="jumlah" name="jumlah" min="1" required>
            </div>

            <div class="form-group">
                <label for="asal_induk">Asal Induk:</label>
                <input type="text" id="asal_induk" name="asal_induk" required>
            </div>

            <button type="submit" class="btn-submit">
                Simpan Laporan Induk
            </button>
        </form>
    </div>
</main>
@endsection
