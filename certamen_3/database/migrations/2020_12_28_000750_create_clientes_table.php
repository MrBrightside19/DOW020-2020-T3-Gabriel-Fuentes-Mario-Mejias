<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('rut');
            $table->integer('edad');
            $table->string('email');
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
        // Schema::dropIfExists('clientes');
        Schema::create('clientes', function (Blueprint $table) {
            $table->dropColumn('nombres');
            $table->dropColumn('apellidos');
            $table->dropColumn('rut');
            $table->dropColumn('edad');
            $table->dropColumn('email');
            $table->dropSoftDeletes();
        });
    }
}
