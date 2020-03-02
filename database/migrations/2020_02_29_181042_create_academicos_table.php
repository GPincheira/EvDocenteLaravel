<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academicos', function (Blueprint $table) {
          $table->integer('id')->unique();
          $table->char('verificador',1);
          $table->string('Nombre');
          $table->string('ApellidoPaterno');
          $table->string('ApellidoMaterno');
          $table->string('TituloProfesional');
          $table->string('GradoAcademico');
          $table->unsignedInteger('CodigoDpto');
          $table->enum('Categoria', ['Instructor','Auxiliar','Adjunto','Titular']);
          $table->integer('HorasContrato');
          $table->string('TipoPlanta');
          $table->enum('Estado', ['Activo', 'Inactivo']);
          $table->primary('id');
          $table->foreign('CodigoDpto')
                ->references('id')
                ->on('departamentos');
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
        Schema::dropIfExists('academicos');
    }
}
