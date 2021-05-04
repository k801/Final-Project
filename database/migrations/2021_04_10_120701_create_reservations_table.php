<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) 
        {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->dateTime('attendance_date');
            $table->time('attendance_time');
            $table->unsignedBigInteger('table_number');
            $table->time('time');
            $table->enum('status',['pendding','confirmed','cancelled']);
            $table->timestamps();
            $table->timestamps() ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
