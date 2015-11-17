<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('event_id');
            $table->string('eventName');

            $table -> integer('eventUserId') -> unsigned() -> default(0);
            $table->foreign('eventUserId')
                    ->references('id')->on('users')
                    ->onDelete('cascade');

            $table -> integer('eventLocationId') -> unsigned() -> default(0);
            $table->foreign('eventLocationId')
                    ->references('id')->on('marker_location')
                    ->onDelete('cascade');

            $table->string('eventImage', 20);

            $table->string('eventDescription', 500);

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
        Schema::drop('events');
    }
}
