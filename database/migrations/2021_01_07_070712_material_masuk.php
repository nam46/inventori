<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MaterialMasuk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_masuk',function(Blueprint $table ){
            $table->increments('id_material_masuk');
            $table->double('harga_total');
            $table->string('kode_transaksi_masuk');
            $table->unsignedInteger('suplier_id');
            $table->foreign('suplier_id')->references('id_suplier')->on('suplier');
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
        Schema::dropIfExists('material_masuk');
    }
}
