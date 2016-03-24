<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FirstTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_info', function (Blueprint $table) {
            $table->increments('id');
            $table->primary('man_number')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->stirng('other_names');
            $table->string('email')->unique();
            $table->enum('position', array('sdf',lecturer,'seniorLecturer', 'headOfDepartment', 'dean', 'superuser'));
            $table->string('department');
            $table->date('renewedAt');
            $table->enum('contractStatus', array('active', 'pending', 'toExpire', 'expired'));
            $table->enum('applicationStage', array('contractsOffice', 'deansOffice', 'unsubmitted'));
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
        Schema::drop('staff_info');
    }
}
