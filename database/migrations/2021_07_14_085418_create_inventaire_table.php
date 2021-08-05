<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventaireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventaire', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_product') ;
            $table->foreign('id_product')->references('id')->on('products');
            $table->timestamps();
            $table->string('Refinv');
            $table->string('Libelle');
            $table->string('note');
            $table->date('date_creation');
            $table->double('Enstock');
            $table->double('quanaj');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventaire');
    }
}
