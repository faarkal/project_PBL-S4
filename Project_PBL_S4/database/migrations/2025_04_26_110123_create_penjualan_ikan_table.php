<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penjualan_ikan', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_ikan');
            $table->integer('stok');
            $table->integer('angka_kehidupan'); // dalam persen (misal: 95)
            $table->integer('angka_kematian');  // dalam persen (misal: 5)
            $table->string('ukuran'); // contoh: "5 cm"
            $table->integer('total')->nullable(); // total hasil hidup (boleh null, bisa dihitung otomatis)
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualan_ikan');
    }
};
