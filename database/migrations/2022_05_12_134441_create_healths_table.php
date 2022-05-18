<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('healths', function (Blueprint $table) {
            // $table->id();
            $table->string('Property_No');
            $table->string('Description');
            $table->string('Date_Aquired');
            $table->string('Aquisition_Cost');
            $table->string('Accountable_Person');
            $table->string('Location');
            $table->string('Med_dental_equipment');
            $table->string('Office_Eq');
            $table->string('Hospital_Eq');
            $table->string('FurnitureNFixtures');
            $table->string('Motor_Vehicles');
            $table->string('Info_Tech');
            $table->string('Other_Machine_Eq');
            $table->string('Other_Asset');
            $table->string('Remark');
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
        Schema::dropIfExists('healths');
    }
}
