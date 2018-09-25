<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->increments('id');

            $table->string('last_name',20)->nullable();
            $table->string('first_name',20)->nullable();
            $table->string('position',80);
            $table->longText('comment')->nullable();

            $table->string('address',100)->nullable();

            $table->integer('company_id')->index()->unsigned();
            $table->foreign('company_id')->references('id')->on('companies');

            $table->integer('city_id')->index()->unsigned()->nullable();
            $table->foreign('city_id')->references('id')->on('cities');

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
        Schema::dropIfExists('positions');
    }
}
