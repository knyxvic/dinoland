<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->float('prixTTC');
            $table->string('adresse_livraison')->nullable();
            $table->string('adresse_facturation')->nullable();
            $table->unsignedBigInteger('mode_livraison_id');
            $table->unsignedBigInteger('statut_commande_id');
            $table->unsignedBigInteger('client_id');
            $table->timestamps();
            $table->foreign('mode_livraison_id')->references('id')->on('mode_livraisons');
            $table->foreign('statut_commande_id')->references('id')->on('statut_commandes');
            $table->foreign('client_id')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commandes');
    }
}
