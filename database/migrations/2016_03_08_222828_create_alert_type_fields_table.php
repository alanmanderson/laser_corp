<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlertTypeFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alert_type_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('alert_type_id')->unsigned();
            $table->string('xml_field');
            $table->string('table_field');
            $table->timestamps();
            $table->foreign('alert_type_id')->references('id')->on('alert_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('alert_type_fields');
    }
}
