<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avisos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('jugadorID');
            $table->integer('resultadoID');
            $table->json('areas_cognitivas')->nullable();
            $table->dateTime('fecha');
            $table->boolean('automatico')->default(true);
            $table->boolean('leido')->default(false);
            $table->boolean('activo')->default(true);
        });

        Schema::table('usuarios', function (Blueprint $table) {
            $table->json('avisos')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avisos');
    }
}
