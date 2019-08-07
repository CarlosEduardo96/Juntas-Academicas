<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cedula', 100);
            $table->string('nombre', 100);
            $table->string('ap_paterno', 100);
            $table->string('ap_materno', 100);
            $table->tinyInteger('edad');
            $table->string('sexo', 30);
            $table->string('telefono', 20);
            $table->string('correo', 30)->unique();;
            $table->string('puesto', 100);
            $table->string('area', 100);
            $table->bigInteger('idAcademia')->nullable()->unsigned();                     
            $table->bigInteger('idJefe')->nullable()->unsigned();
            $table->foreign('idAcademia')->references('id')->on('academias');            
            $table->foreign('idJefe')->references('id')->on('jef_carreras'); 
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
        Schema::dropIfExists('docentes');
    }
}
