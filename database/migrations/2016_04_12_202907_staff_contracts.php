<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StaffContracts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {

            $table->string('last_modified_by');
            $table->dateTime('renewed_on');
            $table->dateTime('expires_on');
            $table->text('applicationStage')->nullable();
            $table->increments('id');
            $table->timestamps();
            $table->integer('man_number')->unsigned();
            $table->foreign('man_number')->references('man_number')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contracts');
    }
}
