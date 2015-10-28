<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAdditionalIngoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userAdditionalInfo', function (Blueprint $table) {
            $table->increments('UAI_id');
            $table->string('profileImage', 20);

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('firstName', 20);
            $table->string('lastName', 20);
            $table->string('bio', 500);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('userAdditionalInfo');
    }
}
