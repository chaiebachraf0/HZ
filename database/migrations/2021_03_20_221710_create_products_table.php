<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string(column:'name');
            $table->string(column:'category');
            $table->string(column:'marque');
            $table->enum('type', ['materiel','service'])->default('materiel');
            $table->enum('typep', ['HT','TTC'])->default('HT');
            $table->enum('typetaxe', ['0','fodec'])->default('0');
            $table->integer(column:'pricev');
            $table->integer(column:'priceht');
            $table->integer(column:'pricettc');
            $table->double(column:'refconst')->default(0);
            $table->double(column:'refint');
            $table->enum('TVA',[0,7,13,19])->default(0);
            $table->integer(column:'Enstock')->default(0);
            $table->string(column:'desc')->default(null);
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
        Schema::dropIfExists('products');
    }
}
