<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonInterneProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bon_interne_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')
                ->constrained('prducts')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('bonInterne_id')
                ->constrained('bon_internes')
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
        Schema::dropIfExists('bon_interne_products');
    }
}
