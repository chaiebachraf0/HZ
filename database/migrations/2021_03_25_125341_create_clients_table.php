<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string(column:'name');
            $table->enum('type', ['particulier','professionel'])->default('particulier');
            $table->string(column:'raisonsociale');
            $table->double(column:'matfiscale');
            $table->enum('civilite', ['M','Mme'])->default('M');
            $table->string(column:'email');
            $table->string(column:'adress');
            $table->date(column:'delai');
            $table->string(column:'ntelephone');
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
        Schema::dropIfExists('clients');
    }
}
