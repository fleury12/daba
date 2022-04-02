<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->integer('prix');
            $table->string('images');
            $table->timestamps();

            //Foreign
            $table->bigInteger('id_categorie')->unsigned();
            $table->bigInteger('id_restaurant')->unsigned();

            //Liaison des tables
            $table->foreign('id_categorie')->references('id')->on('categorie')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('id_restaurant')->references('id')->on('restaurants')
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
        Schema::dropIfExists('plats',function (Blueprint $table) {
            $table->dropForeign('plats_id_categorie_foreign');
            $table->dropForeign('plats_id_restaurant_foreign');
            });
    }
}
