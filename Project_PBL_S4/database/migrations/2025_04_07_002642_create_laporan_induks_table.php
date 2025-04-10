<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('laporan_induks', function (Blueprint $table) {
        $table->id();
        $table->string('nama_induk');
        $table->string('jenis_kelamin');
        $table->string('asal_induk');
        $table->integer('jumlah');
        $table->date('tanggal_masuk');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_induks');
    }
};
