<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSquadMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('squad_members', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('role');
            $table->string('email');
            $table->string('imageURL')->default('avatar.png');
            $table->unsignedBigInteger('business_unit_id');       
            $table->timestamps();
            
            $table->foreign('business_unit_id')->references('id')->on('business_units')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('squad_members');
    }
}
