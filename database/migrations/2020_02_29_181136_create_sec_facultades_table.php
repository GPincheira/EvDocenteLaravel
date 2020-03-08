<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecFacultadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secFacultades', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('CodigoFacultad')->unique();
            $table->primary('id');
            $table->foreign('id')
                  ->references('id')
                  ->on('users');
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
        Schema::dropIfExists('secFacultades');
    }
}
