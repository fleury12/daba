<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaiementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paiements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('valeur');
            $table->timestamps();

             //Foreign
             $table->bigInteger('id_type_paiement')->unsigned();

             //Liaison des tables
             $table->foreign('id_type_paiement')->references('id')->on('type_paiement')
                 ->onDelete('cascade')
                 ->onUpdate('cascade');
 
             //Parametres
             $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paiements',function(Blueprint $table){
            $table->dropForeign('paiements_id_type_paiement_foreign');
        });
    }
}
