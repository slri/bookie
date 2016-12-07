<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwnedBy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owned_by', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('car_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('car_id')->references('id')->on('cars')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();

            $table->primary(['user_id', 'car_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('owned_by');
    }
}
