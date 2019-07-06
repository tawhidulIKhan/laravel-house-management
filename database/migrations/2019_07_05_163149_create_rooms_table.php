<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no');
            $table->string('rent');
            $table->unsignedBigInteger('house_id')->nullable();
            $table->unsignedInteger('image_id')->nullable();
            $table->timestamps();

            $table->foreign('house_id')
                ->references('id')->on('houses')
                ->onDelete('cascade');

            $table->foreign('image_id')
                ->references('id')->on('media')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
