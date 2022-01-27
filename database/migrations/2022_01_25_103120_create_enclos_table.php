<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnclosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enclos', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->float('superficie');
            $table->unsignedBigInteger('type_enclos_id');
            $table->unsignedBigInteger('climat_id');
            $table->timestamps();
            $table->foreign('type_enclos_id')->references('id')->on('type_enclos');
            $table->foreign('climat_id')->references('id')->on('climats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enclos');
    }
}
