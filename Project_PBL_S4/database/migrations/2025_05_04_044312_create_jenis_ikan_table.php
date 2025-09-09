<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jenis_ikans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ikan');
            $table->string('foto_ikan')->nullable(); // untuk menyimpan path foto
            $table->text('deskripsi_ikan')->nullable(); // untuk deskripsi ikan
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jenis_ikans');
    }
};