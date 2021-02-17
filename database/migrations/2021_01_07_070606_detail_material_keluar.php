<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailMaterialKeluar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_material_keluar',function(Blueprint $table ){
            $table->increments('id_detail_material_keluar');
            $table->double('jumlah_material_keluar');
            $table->unsignedInteger('material_keluar_id');
            $table->foreign('material_keluar_id')->references('id_material_keluar')->on('material_keluar');
            $table->unsignedInteger('material_id');
            $table->foreign('material_id')->references('id_material')->on('material');
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
        Schema::dropIfExists('detail_material_keluar');
    }
}
