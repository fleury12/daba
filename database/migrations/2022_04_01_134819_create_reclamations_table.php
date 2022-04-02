<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReclamationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reclamations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('libele');
            $table->string('description');
            $table->timestamps();

          //Foreign
        
          $table->bigInteger('id_commandes')->unsigned()->nullable();

          //Liaison des tables
          $table->foreign('id_commandes')->references('id')->on('commandes')
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
        Schema::dropIfExists('reclamations',function (Blueprint $table) {
            $table->dropForeign('reclamations_id_commandes_foreign');
        });
    }
}
