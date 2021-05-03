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
            $table->unsignedBigInteger('guests_number');
<<<<<<< HEAD
            $table->time('time');
            $table->enum('status',['pendding','confirmed','cancelled']);
            $table->enum('status',['penddind','confirmed','cancedled']);
            $table->timestamps();
=======
            $table->enum('status',['pendding','confirmed','cancelled']);
            $table->enum('status',['penddind','confirmed','cancedled']);
            $table->timestamps() ;
>>>>>>> db514c57f78583c1bf33f71aec0bf7a7dcb12fb5
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
