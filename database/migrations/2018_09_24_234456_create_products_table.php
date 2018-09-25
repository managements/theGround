<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name',80);
            $table->string('ref')->unique();
            $table->string('tva',2)->default(false);
            $table->longText('description');
            $table->string('size')->nullable();
            $table->string('qt')->default(false);
            $table->string('amount_min')->default(false);
            $table->string('amount_max')->default(false);

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
        Schema::dropIfExists('products');
    }
}
