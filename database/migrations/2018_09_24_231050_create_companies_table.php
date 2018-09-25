<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');

            $table->string('brand',80)->unique()->nullable();
            $table->string('slug',80)->unique();
            $table->string('name',60)->unique();
            $table->string('licence',60)->unique();
            $table->string('turnover',10);
            $table->string('taxes',2);
            $table->string('fax',10)->unique();
            $table->string('speaker',15);
            $table->string('address',100);
            $table->string('build',5);
            $table->string('floor',3);
            $table->string('apt_nbr',5)->nullable();
            $table->string('zip',6);

            $table->integer('city_id')->index()->unsigned();
            $table->foreign('city_id')->references('id')->on('cities');

            $table->integer('premium_id')->index()->insigned();
            $table->foreign('premium_id')->references('id')->on('premiums');

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
        Schema::dropIfExists('companies');
    }
}
