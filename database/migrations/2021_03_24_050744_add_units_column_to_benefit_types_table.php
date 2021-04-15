<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUnitsColumnToBenefitTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('benefit_types', function (Blueprint $table) {
            //   $table->tinyInteger('status')->default('1');
            $table->string('unit_left')->default('');
            $table->string('unit_right')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('benefit_types', function (Blueprint $table) {
            //
        });
    }
}
