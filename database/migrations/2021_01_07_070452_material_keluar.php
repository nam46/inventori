<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MaterialKeluar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_keluar',function(Blueprint $table ){
            $table->increments('id_material_keluar');
            $table->double('harga_total');
            $table->string('kode_transaksi_keluar');
            $table->unsignedInteger('sekertaris_id');
            $table->foreign('sekertaris_id')->references('id_sekertaris')->on('sekertaris');
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
        Schema::dropIfExists('material_keluar');
    }
}
