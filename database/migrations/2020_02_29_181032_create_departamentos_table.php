<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departamentos', function (Blueprint $table) {
          $table->integer('id')->unique();
          $table->string('Nombre')->unique();
          $table->integer('CodigoFacultad');
          $table->enum('Estado', ['Activo', 'Inactivo']);
          $table->primary('id');
          $table->foreign('CodigoFacultad')
                ->references('id')
                ->on('facultades');
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
        Schema::dropIfExists('departamentos');
    }
}
