<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            //Foreign
        
          $table->bigInteger('id_client')->unsigned();
          $table->bigInteger('id_role')->unsigned();

          //Liaison des tables
          $table->foreign('id_client')->references('id')->on('clients')
              ->onDelete('cascade')
              ->onUpdate('cascade');
          $table->foreign('id_role')->references('id')->on('roles')
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
        Schema::dropIfExists('client_roles',function (Blueprint $table) {
            $table->dropForeign('client_roles_id_client_foreign');
            $table->dropForeign('client_roless_id_role_foreign');
        });
    }
}
