<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHolidayRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holiday_request', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->date('from');
            $table->date('to');
            $table->enum('type', ['paid','unpaid', 'sick leave']);
            $table->enum('status', ['pending','rejected', 'accepted']);
            $table->integer('created_by');
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
        Schema::dropIfExists('holiday_request');
    }
}
