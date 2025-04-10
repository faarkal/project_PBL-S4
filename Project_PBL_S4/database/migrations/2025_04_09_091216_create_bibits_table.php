<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBibitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bibits', function (Blueprint $table) {
            $table->id(); // Kolom ID otomatis
            $table->string('jenis_bibit'); // Kolom untuk jenis bibit
            $table->date('bulan_lahir'); // Kolom untuk bulan lahir
            $table->integer('jumlah_bibit'); // Kolom untuk jumlah bibit
            $table->decimal('kematian_ikan', 5, 2)->default(0); // Kolom untuk kematian ikan
            $table->decimal('harga_bibit', 10, 2); // Kolom untuk harga bibit
            $table->timestamps(); // Menambahkan kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bibits'); // Menghapus tabel jika rollback dilakukan
    }
}
