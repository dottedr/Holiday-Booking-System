<?php

use Illuminate\Support\Facades\Schema;
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
            $table->increments('id')->unique();
            $table->boolean('verified')->default(false);
            $table->boolean('isadmin')->default(false);
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->integer('holiday_allowance')->default(30);
            $table->integer('holiday_taken')->default(0);
            $table->string('comment',1000)->default(' ');
            $table->string('role')->default(' ');
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
        Schema::dropIfExists('users');
    }
}
