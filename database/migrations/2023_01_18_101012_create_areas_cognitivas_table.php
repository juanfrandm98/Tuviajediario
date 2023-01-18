<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreasCognitivasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas_cognitivas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre');
        });

        Schema::table('juegos', function (Blueprint $table) {
            $table->json('area_cognitiva')->nullable()->default(null)->change();
            $table->renameColumn('area_cognitiva', 'areas_cognitivas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('areas_cognitivas');
    }
}
