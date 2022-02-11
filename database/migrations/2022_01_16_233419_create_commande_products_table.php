<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandeProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commande_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')
            ->constrained('products')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('commande_id')
            ->constrained('commandes')
            ->onUpdate('cascade')
            ->onDelete('cascade');
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
        Schema::dropIfExists('commande_products');
    }
}
