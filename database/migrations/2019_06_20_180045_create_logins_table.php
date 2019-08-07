<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',100);
            $table->string('usuario',100)->unique();
            $table->string('contraseña',100);
            $table->string('tipo',100);
            $table->bigInteger('iddocente')->nullable()->unsigned();                     
            $table->bigInteger('idJefe')->nullable()->unsigned();
            $table->foreign('iddocente')->references('id')->on('docentes');            
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
        Schema::dropIfExists('logins');
    }
}
