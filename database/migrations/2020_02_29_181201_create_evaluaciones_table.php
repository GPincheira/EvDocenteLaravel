<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluaciones', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('RUTAcademico');
          $table->unsignedInteger('CodigoComision');
          $table->integer('CodigoFacultad');
          $table->year('año');
          $table->string('Argumento',100)->nullable();
          $table->float('n1',2,1)->nullable();
          $table->float('n2',2,1)->nullable();
          $table->float('n3',2,1)->nullable();
          $table->float('n4',2,1)->nullable();
          $table->float('n5',2,1)->nullable();
          $table->integer('p1')->nullable();
          $table->integer('p2')->nullable();
          $table->integer('p3')->nullable();
          $table->integer('p4')->nullable();
          $table->integer('p5')->nullable();
          $table->float('NotaFinal',3,2);
          $table->foreign('RUTAcademico')
                ->references('id')
                ->on('academicos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
          $table->foreign('CodigoComision')
                ->references('id')
                ->on('comisiones');
          $table->foreign('CodigoFacultad')
                ->references('id')
                ->on('facultades')
                ->onUpdate('cascade')
                ->onDelete('cascade');
          $table->softDeletes();
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
        Schema::dropIfExists('evaluaciones');
    }
}
