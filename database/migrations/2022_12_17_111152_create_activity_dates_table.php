<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_dates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('activity_id');
            $table->date('activity_date')->index();
            $table->timestamps();

            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity_dates');
    }
}
