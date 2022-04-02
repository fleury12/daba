<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quantite');
            $table->integer('montant');
            $table->boolean('statut')->default(0);
            $table->timestamps();

             //Foreign
             $table->bigInteger('id_user')->unsigned();
             $table->bigInteger('id_coupon')->unsigned()->nullable();

             //Liaison des tables
             $table->foreign('id_user')->references('id')->on('users')
                 ->onDelete('cascade')
                 ->onUpdate('cascade');

            $table->foreign('id_coupon')->references('id')->on('coupons')
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
        Schema::dropIfExists('commandes',function (Blueprint $table) {
            $table->dropForeign('commandes_id_user_foreign');
            $table->dropForeign('commandes_id_coupon_foreign');

        });
    }
}
