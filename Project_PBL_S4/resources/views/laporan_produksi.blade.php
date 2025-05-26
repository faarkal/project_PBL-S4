@extends('layouts.app')

@section('content')
    <main class="full-screen-form">
        <div class="form-container">
            <h2>Laporan Produksi Bibit Ikan</h2>
            <form action="{{ route('laporan.produksi.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="jenis_bibit">Jenis Bibit Ikan:</label>
                    <input type="text" id="jenis_bibit" name="jenis_bibit" required>
                </div>

                <div class="form-group">
                    <label for="bulan_lahir">Bulan Lahir Bibit:</label>
                    <input type="month" id="bulan_lahir" name="bulan_lahir" required>
                </div>

                <div class="form-group">
                    <label for="jumlah_bibit">Jumlah Bibit:</label>
                    <input type="number" id="jumlah_bibit" name="jumlah_bibit" min="1" required>
                </div>

                <div class="form-group">
                    <label for="harga_bibit">Harga Bibit (Rp):</label>
                    <input type="number" id="harga_bibit" name="harga_bibit" min="0" required>
                </div>

                <button type="submit" class="btn-submit">
                    Simpan Laporan
                </button>
            </form>
        </div>
    </main>
@endsection
