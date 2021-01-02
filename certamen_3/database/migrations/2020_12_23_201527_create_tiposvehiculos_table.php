<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposvehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiposvehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('marca');
            $table->string('modelo');
            $table->string('combustible');
            $table->string('motor');
            $table->integer('puertas');
            $table->integer('precio');
            $table->string('clase');
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
        // Schema::dropIfExists('tiposvehiculos');
        Schema::create('tiposvehiculos', function (Blueprint $table) {
            $table->dropColumn('marca');
            $table->dropColumn('modelo');
            $table->dropColumn('combustible');
            $table->dropColumn('motor');
            $table->dropColumn('puertas');
            $table->dropColumn('precio');
            $table->dropColumn('clase');
            $table->dropSoftDeletes();

        });
    }
}
