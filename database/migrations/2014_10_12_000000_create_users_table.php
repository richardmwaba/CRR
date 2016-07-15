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
                $table->integer('man_number')->unsigned()->unique()->primary();
                $table->string('first_name')->nulluable();
                $table->string('last_name')->nulluable();
                $table->string('other_names')->nulluable();
                $table->string('position');
                $table->string('email')->unique();
                $table->string('nationality')->nulluable();
                $table->string('department')->nulluable();
                $table->string('school')->nulluable();
                $table->string('password');
                $table->string('new_user_auth_token')->nullable();;
                $table->string('NRC')->nullable();;
                $table->string('address')->nullable();;
                $table->string('phone_number')->nullable();
                //contracts information
                $table->string('last_modified_by')->nullable();
                $table->date('expires_on')->nullable();
                $table->string('contract_status')->nullable();
                $table->string('contract_tracking')->nullable();
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
