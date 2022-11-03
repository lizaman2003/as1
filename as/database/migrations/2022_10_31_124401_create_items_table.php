<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name', 550);
            $table->string('img', 550);
            $table->integer('price');
            $table->integer('count');
            $table->string('country', 200);
            $table->year('year');
            $table->string('model');
            $table->unsignedBigInteger('category');
            $table->foreign('category')->references('id')->on('cats');
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
        Schema::dropIfExists('items');
    }
};
