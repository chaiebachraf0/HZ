<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepenseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depenses', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['Chèque','Traite'])->default('Chèque');
            $table->string(column:'fournisseur');
            $table->double(column:'montant');
            $table->string(column:'categorie');
            $table->date(column:'datereg');
            $table->string(column:'note');
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
        Schema::dropIfExists('depense');
    }
}
