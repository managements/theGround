<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email',100)->unique();

            $table->integer('deal_id')->index()->unique()->unsigned()->nullable();
            $table->foreign('deal_id')->references('id')->on('deals');

            $table->integer('position_id')->index()->unique()->unsigned()->nullable();
            $table->foreign('position_id')->references('id')->on('positions');

            $table->integer('member_id')->index()->unique()->unsigned()->nullable();
            $table->foreign('member_id')->references('id')->on('members');

            $table->integer('company_id')->index()->unique()->unsigned()->nullable();
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
        Schema::dropIfExists('emails');
    }
}
