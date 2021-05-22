<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnApoointmentIdToAppointmentDays extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appointment_days', function (Blueprint $table) {
            $table->foreignId('appointment_id')->nullable()->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appointment_days', function (Blueprint $table) {
            //
            $table->foreignId('appointment_id')->nullable()->constrained()->onDelete('cascade');
        });
    }
}
