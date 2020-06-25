<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComisionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comisiones', function (Blueprint $table) {
          $table->increments('id');
          $table->year('Año');
          $table->date('Fecha');
          $table->integer('CodigoFacultad');
          $table->integer('idSecFacultad');
          $table->string('NombreDecano');
          $table->string('APaternoDecano');
          $table->string('AMaternoDecano');
          $table->string('NombreSecFac');
          $table->string('APaternoSecFac');
          $table->string('AMaternoSecFac');
          $table->string('Nombre1');
          $table->string('APaterno1');
          $table->string('AMaterno1');
          $table->string('Nombre2');
          $table->string('APaterno2');
          $table->string('AMaterno2');
          $table->foreign('CodigoFacultad')
                ->references('id')
                ->on('facultades')
                ->onUpdate('cascade');
          $table->foreign('idSecFacultad')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('comisiones');
    }
}
