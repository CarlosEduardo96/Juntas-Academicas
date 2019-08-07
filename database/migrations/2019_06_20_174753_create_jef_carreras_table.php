<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJefCarrerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jef_carreras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 100);
            $table->string('ap_paterno', 100);
            $table->string('ap_materno', 100);
            $table->tinyInteger('edad');
            $table->string('sexo', 30);
            $table->string('telefono', 20);
            $table->string('correo',100)->unique();
            $table->string('area',100);
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
        Schema::dropIfExists('jef_carreras');
    }
}
