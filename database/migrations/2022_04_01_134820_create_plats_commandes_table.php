<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatsCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plats_commandes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            //Foreign
             $table->bigInteger('id_commande')->unsigned();
             $table->bigInteger('id_plat')->unsigned();



             //Liaison des tables
             $table->foreign('id_commande')->references('id')->on('commandes')
                 ->onDelete('cascade')
                 ->onUpdate('cascade');

             $table->foreign('id_plat')->references('id')->on('plats')
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
        Schema::dropIfExists('plats_commandes',function (Blueprint $table) {
            $table->dropForeign('plats_commandes_id_plat_foreign');
            $table->dropForeign('plats_commandes_id_commande_foreign');
        });
    }
}
