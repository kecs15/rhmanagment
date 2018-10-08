<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCapacitacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capacitaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->string('institucion');
            $table->string('nivel');
            $table->date('desde');
            $table->date('hasta');
            $table->unsignedInteger('candidato_id');
            $table->foreign('candidato_id')->references('id')->on('candidatos');
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
        Schema::dropIfExists('capacitaciones');
    }
}
