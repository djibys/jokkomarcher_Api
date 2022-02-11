<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarqueProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marque_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('marque_id')
                ->constrained('marques')
                ->onUpdate('cascade')
                ->onDelete('cascade');
                $table->foreignId('product_id')
                    ->constrained('products')
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
        Schema::dropIfExists('marque_products');
    }
}
