<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Material extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material',function(Blueprint $table ){
            $table->increments('id_material');
            $table->string('nama_material',25);
            $table->double('harga_satuan');
            $table->integer('stok_material');
            $table->unsignedInteger('kategori_id');
            $table->foreign('kategori_id')->references('id_kategori')->on('kategori');
            $table->unsignedInteger('admin_id');
            $table->foreign('admin_id')->references('id_admin')->on('admin');
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
        Schema::dropIfExists('material');
    }
}
