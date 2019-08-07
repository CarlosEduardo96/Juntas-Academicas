<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealizasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realizas', function (Blueprint $table) {
            $table->bigIncrements('id');            
            $table->bigInteger('idOrden')->nullable()->unsigned();
            $table->bigInteger('idAcuerdo')->nullable()->unsigned();
            $table->foreign('idOrden')->references('id')->on('orden_dias');
            $table->foreign('idAcuerdo')->references('id')->on('acuerdos');            
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
        Schema::dropIfExists('realizas');
    }
}
