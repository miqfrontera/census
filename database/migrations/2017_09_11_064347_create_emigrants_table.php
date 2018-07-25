<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmigrantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emigrants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('surname')->nullable();
            $table->enum('gender', ['M', 'W']); //Man or woman
            $table->string('occupation')->nullable();
            $table->enum('marital_status', ['S', 'M', 'W', 'U']); //Single, Married, Widow/Widower, Unknown
            $table->unsignedInteger('age')->nullable();
            $table->string('address')->nullable();
            $table->string('apple')->nullable();
            $table->mediumText('other_information')->nullable();
            $table->string('documentary_source')->nullable();
            $table->unsignedInteger('year_of_documentation')->nullable();
            $table->unsignedInteger('year_of_birth')->nullable();

            $table->unsignedInteger('location_of_birth_id')->nullable();
            $table->unsignedInteger('location_id');

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
        Schema::dropIfExists('emigrants');
    }
}
