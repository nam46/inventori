<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Admin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin',function(Blueprint $table ){
            $table->increments('id_admin');
            $table->string('username',25);
            $table->string('password',255);
            $table->string('nama_admin',25);
            $table->string('alamat_admin',255)->nullable();
            $table->string('no_telfon_admin',14)->nullable();
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
        Schema::dropIfExists('admin');
    }
}
