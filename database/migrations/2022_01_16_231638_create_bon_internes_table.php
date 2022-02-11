<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonInternesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bon_internes', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->string('numBon');
            $table->boolean('validation');
            $table->string('listProd');
            $table->foreignId('sortieStock_id')
                ->constrained('sortie_stocks')
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
        Schema::dropIfExists('bon_internes');
    }
}
