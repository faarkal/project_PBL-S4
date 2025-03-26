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
        Schema::create('bibits', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_bibit');
            $table->date('bulan_lahir');
            $table->integer('jumlah_bibit');
            $table->decimal('harga_bibit', 10, 2);
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bibits');
    }
};
