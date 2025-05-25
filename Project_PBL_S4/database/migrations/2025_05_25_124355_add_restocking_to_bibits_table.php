<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
    {
        Schema::table('bibits', function (Blueprint $table) {
            $table->integer('restocking')->default(0)->after('jumlah_bibit');
        });
    }

    public function down()
    {
        Schema::table('bibits', function (Blueprint $table) {
            $table->dropColumn('restocking');
        });
    }
};
