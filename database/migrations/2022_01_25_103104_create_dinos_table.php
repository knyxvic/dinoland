<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dinos', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->float('taille');
            $table->float('poids');
            $table->unsignedBigInteger('espece_id');
            $table->unsignedBigInteger('nourriture_id');
            $table->timestamps();
            $table->foreign('espece_id')->references('id')->on('especes');
            $table->foreign('nourriture_id')->references('id')->on('nourritures');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dinos');
    }
}
