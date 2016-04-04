<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Contracts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('contracts', function(Blueprint $table){

            $table->integer('contractStatus');
            $table->integer('applicationStage');
            $table->dateTime('contractDuration');
            $table->timestamps('renewedAt');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('contracts');

    }
}
