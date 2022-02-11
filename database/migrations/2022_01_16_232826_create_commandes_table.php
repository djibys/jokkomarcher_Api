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
            $table->dateTime('date_commande');
            $table->float('montant');
            $table->dateTime('delais_livraison');
            $table->string('etat_commande');
            $table->string('lieu_livraison');
            $table->string('mode_livraison');
            $table->float('prix_total');
            $table->string('modde_paiement');
            $table->timestamps();
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
