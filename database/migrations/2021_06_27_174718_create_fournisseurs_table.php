<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFournisseursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fournisseurs', function (Blueprint $table) {
            $table->id();
            $table->string(column:'NOM');
            $table->enum('CIVILITE', ['M','Mme'])->default('M');
            $table->string(column:'RAISONSOCIALE');
            $table->string(column:'EMAIL');
            $table->string(column:'ADRESSE');
            $table->string(column:'NTELEPHONE');
            $table->string(column:'IDENTIFIANT');
            $table->string(column:'MATFISCALE');
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
        Schema::dropIfExists('fournisseurs');
    }
}
