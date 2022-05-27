<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvincialAdminOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provincial_admin_offices', function (Blueprint $table) {
            $table->string('Property_No');
            $table->string('Date_Aquired');
            $table->string('Particulars');
            $table->string('Quantity');
            $table->string('Unit_Cost');
            $table->string('Total_Cost');
            $table->string('Accumulated_Depreciation');
            $table->string('NetBookValue');
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
        Schema::dropIfExists('provincial_admin_offices');
    }
}
