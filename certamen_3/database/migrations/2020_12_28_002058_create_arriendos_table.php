<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArriendosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arriendos', function (Blueprint $table) {
            $table->id();
            $table->time('hora_origen');
            $table->time('hora_destino');
            $table->date('fecha_origen');
            $table->date('fecha_destino');
            $table->integer('valorfinal');
            $table->char('estado');
            $table->string('imagen_vigente');
            $table->string('imagen_finalizado')->nullable();
            $table->unsignedBigInteger('auto_id');
            $table->unsignedBigInteger('cliente_id');
            
            // $table->primary(['auto_id', 'cliente_id']);
            
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('auto_id')->references('id')->on('autos');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('arriendos');
        Schema::create('arriendos', function (Blueprint $table) {
            $table->dropColumn('hora_origen');
            $table->dropColumn('hora_destino');
            $table->dropColumn('fecha_origen');
            $table->dropColumn('fecha_destino');
            $table->dropColumn('valorfinal');
            $table->dropColumn('estado');
            $table->dropSoftDeletes();
            
        });
    }
}
