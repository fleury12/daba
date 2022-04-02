<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            //Foreign
        
          $table->bigInteger('id_restaurant')->unsigned();
          $table->bigInteger('id_role')->unsigned();

          //Liaison des tables
          $table->foreign('id_restaurant')->references('id')->on('restaurants')
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
        Schema::dropIfExists('restaurant_roles',function (Blueprint $table) {
            $table->dropForeign('restaurant_roles_id_restaurant_foreign');
            $table->dropForeign('restaurant_roles_id_role_foreign');
        });
    }
}
