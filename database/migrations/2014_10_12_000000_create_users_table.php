<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('man_number')->unsigned()->unique();
                $table->string('first_name')->nulluable();
                $table->string('last_name')->nulluable();
                $table->string('other_names')->nulluable();
                $table->string('position');
                $table->string('email')->unique();
                $table->string('nationality')->nulluable();
                $table->string('department')->nulluable();
                $table->string('password');
                $table->rememberToken();
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
        Schema::drop('users');
    }
}
