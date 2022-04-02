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
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('email');
            $table->string('contact');
            $table->timestamps();


             //Foreign
             $table->bigInteger('id_societe')->unsigned();

             //Liaison des tables
             $table->foreign('id_societe')->references('id')->on('societes')
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
        Schema::dropIfExists('clients', function (Blueprint $table) {
            $table->dropForeign('clients_id_societe_foreign');
            });
    }
}