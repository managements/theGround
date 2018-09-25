<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('face',80)->nullable()->unique();
            $table->string('name',25)->unique();
            $table->string('first_name',25);
            $table->string('last_name',25);
            $table->date('birth');
            $table->string('address',150)->nullable();

            $table->integer('city_id')->index()->unique()->unsigned();
            $table->foreign('city_id')->references('id')->on('cities');

            $table->integer('premium_id')->index()->unique()->unsigned();
            $table->foreign('premium_id')->references('id')->on('premiums');

            $table->integer('category_id')->index()->unique()->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');

            $table->integer('user_id')->index()->unique()->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('company_id')->index()->unique()->unsigned();
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
        Schema::dropIfExists('members');
    }
}
