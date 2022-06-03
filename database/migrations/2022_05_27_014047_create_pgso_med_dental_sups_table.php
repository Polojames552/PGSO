<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePgsoMedDentalSupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pgso_med_dental_sups', function (Blueprint $table) {
            $table->id();
            $table->string('article');
            $table->string('description');
            $table->string('stockno');
            $table->string('unitofmeasurement');
            $table->string('unitvalue');
            $table->string('balancecard');
            $table->string('onhandcount');
            $table->string('shortageqty');
            $table->string('shortagevalue');
            $table->string('remark');
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
        Schema::dropIfExists('pgso_med_dental_sups');
    }
}
