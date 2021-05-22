<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 100)->nullable()->default('');
            $table->integer('duration')->unsigned()->nullable()->default(20);
            $table->integer('prepration_time')->unsigned()->nullable()->default(0);
            $table->integer('max_participants')->unsigned()->nullable()->default(2);
            $table->integer('advanced_bookable')->unsigned()->nullable()->default(7);
            $table->text('description')->nullable();
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
        Schema::dropIfExists('appointments');
    }
}
