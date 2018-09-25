<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('speaker')->nullable();
            $table->string('address')->nullable();
            $table->string('build')->nullable();
            $table->string('floor')->nullable();
            $table->string('apt_nbr')->nullable();
            $table->string('description')->nullable();
            $table->integer('vote')->nullable();
            $table->boolean('provider')->default(false);
            $table->boolean('client')->default(false);
            $table->integer('city_id')->index()->unsigned()->nullable();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->integer('company_id')->index()->unsigned()->nullable();
            $table->foreign('company_id')->references('id')->on('companies');
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
        Schema::dropIfExists('deals');
    }
}
