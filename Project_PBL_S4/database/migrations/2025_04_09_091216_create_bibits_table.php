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
            $table->id(); 
            $table->string('jenis_bibit'); 
            $table->date('bulan_lahir');
            $table->integer('jumlah_bibit'); 
            $table->decimal('kematian_ikan', 5, 2)->default(0); 
            $table->decimal('harga_bibit', 10, 2); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bibits'); 
    }
}
