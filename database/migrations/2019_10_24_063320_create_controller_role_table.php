<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateControllerRoleTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controller_role', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('check')->default(0);
            $table->integer('controller_id')->unsigned();
            $table->integer('role_id')->unsigned();

        });
    }
    public function down()
    {
        Schema::dropIfExists('controller_role');
    }


}
