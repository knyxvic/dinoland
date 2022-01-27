<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDinoEnclosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dino_enclos', function (Blueprint $table) {
            $table->bigInteger('dino_id')->unsigned();
            $table->bigInteger('enclos_id')->unsigned();
            $table->dateTimeTz('dateArrive')->default(now());
            $table->dateTimeTz('dateSortie')->nullable();
            $table->timestamps();
            $table->foreign('dino_id')->references('id')->on('dinos');
            $table->foreign('enclos_id')->references('id')->on('enclos');
            $table->primary(['dino_id', 'enclos_id', 'dateArrive']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dino_enclos');
    }
}
