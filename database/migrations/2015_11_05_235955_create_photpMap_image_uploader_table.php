<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotpMapImageUploaderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photoMap_image_uploader', function (Blueprint $table) {
            $table->increments('photoMapId');

            $table -> integer('userId') -> unsigned() -> default(0);
            $table->foreign('userId')
                    ->references('id')->on('users')
                    ->onDelete('cascade');

            $table->string('title', 20);

            $table -> integer('markerLocationId') -> unsigned() -> default(0);
            $table->foreign('markerLocationId')
                    ->references('id')->on('marker_location')
                    ->onDelete('cascade');

            $table->string('locationImage', 20);
            $table->text('imageDescription');

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
        Schema::drop('photoMap_image_uploader');
    }
}
