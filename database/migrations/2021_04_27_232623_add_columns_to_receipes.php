<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToReceipes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('receipes', function (Blueprint $table) 
        {
            $table->integer('evaluation');
            $table->unsignedDouble('price') ;
            $table->time('prape_time') ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('receipes', function (Blueprint $table) {
            //
        });
    }
}
