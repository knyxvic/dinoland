<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnclosPersonnelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enclos_personnel', function (Blueprint $table) {
            $table->bigInteger('enclos_id')->unsigned();
            $table->bigInteger('personnel_id')->unsigned();
            $table->timestamps();
            $table->foreign('enclos_id')->references('id')->on('enclos');
            $table->foreign('personnel_id')->references('id')->on('personnels');
            $table->primary(['enclos_id', 'personnel_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enclos_personnel');
    }
}
