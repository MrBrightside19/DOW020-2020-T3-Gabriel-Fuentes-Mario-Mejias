<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autos', function (Blueprint $table) {
            $table->id();
            $table->string('patente');
            $table->string('anio');
            $table->string('imagen');
            $table->string('transmision');
            $table->char('estado');
            $table->unsignedBigInteger('tiposvehiculo_id');
            $table->foreign('tiposvehiculo_id')->references('id')->on('tiposvehiculos');
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
        Schema::dropIfExists('autos');
        
    }
}
