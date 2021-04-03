<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseDirectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_directions', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->integer('gender')->default(0);
            $table->text('content');
            $table->timestamps();
        });
    }

//    1950 -> 2020
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('house_directions');
    }
}
