<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Owner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owner',function(Blueprint $table ){
            $table->increments('id_owner');
            $table->string('username',25);
            $table->string('password',255);
            $table->string('nama_owner',25);
            $table->string('alamat_owner',255)->nullable();
            $table->string('no_telfon_owner',14)->nullable();
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
        Schema::dropIfExists('owner');
    }
}
