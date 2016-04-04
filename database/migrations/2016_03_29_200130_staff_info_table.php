<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StaffInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
            Schema::create('staff_info_table', function (Blueprint $table) {
            $table->integer('man-number')->unsigned()->unique();
            $table->string('other-names')->nullable();
            $table->string('nationality');
            $table->string('department');
            $table->timestamps('renewedAt');
                $table->foreign('man-number')->references('man-number')->on('users')->onDelete('cascade');

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
        Schema::drop('staff_info_table');

    }
}