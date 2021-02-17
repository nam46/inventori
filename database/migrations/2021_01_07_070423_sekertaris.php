<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sekertaris extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sekertaris',function(Blueprint $table ){
            $table->increments('id_sekertaris');
            $table->string('username',25);
            $table->string('password',255);
            $table->string('nama_sekertaris',25);
            $table->string('alamat_sekertaris',255)->nullable();
            $table->string('no_telfon_sekertaris',14)->nullable();
            $table->unsignedInteger('owner_id');
            $table->foreign('owner_id')->references('id_owner')->on('owner');
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
        Schema::dropIfExists('sekertaris');
    }
}
