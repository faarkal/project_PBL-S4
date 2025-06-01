<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUkuranIkanToBibitsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('bibits', function (Blueprint $table) {
            $table->decimal('ukuran_ikan')->after('jenis_bibit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('bibits', function (Blueprint $table) {
            $table->dropColumn('ukuran_ikan');
        });
    }
}