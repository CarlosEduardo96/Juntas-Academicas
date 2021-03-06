<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObtienesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obtienes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idJunta')->nullable()->unsigned();
            $table->bigInteger('idOrden')->nullable()->unsigned();
            $table->foreign('idJunta')->references('id')->on('juntas');
            $table->foreign('idOrden')->references('id')->on('orden_dias');
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
        Schema::dropIfExists('obtienes');
    }
}
