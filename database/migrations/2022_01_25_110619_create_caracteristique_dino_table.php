<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaracteristiqueDinoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caracteristique_dino', function (Blueprint $table) {
            $table->bigInteger('caracteristique_id')->unsigned();
            $table->bigInteger('dino_id')->unsigned();
            $table->timestamps();
            $table->foreign('caracteristique_id')->references('id')->on('caracteristiques');
            $table->foreign('dino_id')->references('id')->on('dinos');
            $table->primary(['caracteristique_id','dino_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caracteristique_dino');
    }
}
