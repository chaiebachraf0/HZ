<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facture', function (Blueprint $table) {
            $table->id();
            $table->float('Montant_TTC');
            $table->float('Montant_TVA');
            $table->float('Total_HT');
            $table->unsignedBigInteger('id_client') ;
            $table->foreign('id_client')->references('id')->on('clients');
            $table->unsignedBigInteger('id_product') ;
            $table->foreign('id_product')->references('id')->on('products');
            $table->enum('Etat',['payé','patiellement payé','non payé'])->default('non payé');
            $table->string('Ref_Facture');
            $table->timestamps();
            $table->date('date_echeance');
            $table->integer('quantite_entre');
            $table->string('Nom_client');
            $table->integer('note');
            $table->float('Timbre_fiscale');
            $table->string('Libelle');
            $table->date('date_creation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facture');
    }
}
