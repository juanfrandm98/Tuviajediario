<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('email')->unique();
            $table->string('contrasenia')->nullable();
            $table->string('nombre');
            $table->string('telefono');
            $table->enum('genero', ['hombre', 'mujer', 'otro']);
            $table->integer('rolID');
            $table->json('tutela')->nullable();
            $table->json('gestiona')->nullable();
            $table->string('alias')->nullable();
            $table->string('nombre_madre')->nullable();
            $table->json('resultados')->nullable();
            $table->json('ultimos_viajes')->nullable();
        });

        Schema::table('resultados', function (Blueprint $table) {
            $table->integer('jugador')->change();
            $table->renameColumn('jugador', 'jugadorID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
