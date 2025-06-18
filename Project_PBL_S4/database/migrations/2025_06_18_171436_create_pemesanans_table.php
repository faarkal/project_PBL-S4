<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesanansTable extends Migration
{
    public function up()
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pembeli');
            $table->string('no_telepon');
            $table->foreignId('jenis_ikan_id')->constrained('jenis_ikans');
            $table->integer('jumlah_bibit');
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pemesanans');
    }
}