<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('device_serial_number');
            $table->bigInteger('session_id')->unsigned();
            $table->integer('zone_code')->unsigned();

            $table->integer('Olevel');
            $table->integer('UV');
            $table->integer('temperature');
            $table->float('weather_condition');
            $table->float('lat');
            $table->float('long');
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
        Schema::dropIfExists('tests');
    }
}
