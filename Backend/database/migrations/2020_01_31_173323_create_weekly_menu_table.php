<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeeklyMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weekly_menu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedTinyInteger('day');
            $table->bigInteger('meal_id')->unsigned();
            $table->timestamps();
            $table->foreign('meal_id')->references('id')->on('meals')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weekly_menu');
    }
}
