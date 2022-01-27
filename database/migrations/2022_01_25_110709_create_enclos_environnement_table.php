<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnclosEnvironnementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enclos_environnement', function (Blueprint $table) {
            $table->bigInteger('enclos_id')->unsigned();
            $table->bigInteger('environnement_id')->unsigned();
            $table->float('superficie');
            $table->timestamps();
            $table->foreign('enclos_id')->references('id')->on('enclos');
            $table->foreign('environnement_id')->references('id')->on('environnements');
            $table->primary(['enclos_id','environnement_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enclos_environnement');
    }
}
