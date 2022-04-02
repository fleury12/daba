<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            //Foreign
        
          $table->bigInteger('id_user')->unsigned();
          $table->bigInteger('id_role')->unsigned();

          //Liaison des tables
          $table->foreign('id_user')->references('id')->on('user')
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
        Schema::dropIfExists('user_roles',function (Blueprint $table) {
            $table->dropForeign('user_roles_id_user_foreign');
            $table->dropForeign('user_roles_id_role_foreign');
        });
    }
}
