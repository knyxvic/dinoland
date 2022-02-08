<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->float('prix');
            $table->bigInteger('quantite');
            $table->unsignedBigInteger('taxe_id');
            $table->unsignedBigInteger('category_id');
            $table->timestamps();
            $table->foreign('taxe_id')->references('id')->on('taxes');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produits', function (Blueprint $table) {
            $table->dropForeign(['taxe_id']); // Drops index 'geo_state_index'
            $table->dropForeign(['category_id']); // Drops index 'geo_state_index'
        });
        Schema::dropIfExists('produits');
    }
}
