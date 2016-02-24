<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vendor_id');
            $table->string('device_key');
            $table->string('manufacturer');
            $table->string('name');
            $table->string('ip_address');
            $table->string('mac_address')->unique();
            $table->string('serial_number');
            $table->datetime('firmware_date');
            $table->string('firmware_version');
            $table->string('site_id')->unsigned();
            $table->foreign('site_id')->references('id')->on('sites');
            $table->integer('dealer_id')->unsigned();
            $table->foreign('dealer_id')->references('id')->on('dealers');
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
        Schema::drop('devices');
    }
}
