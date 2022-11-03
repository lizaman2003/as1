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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->enum('delivery', ['Самовывоз', 'Курьером', 'Почта России']);
            $table->enum('pay', ['Картой при получении ', 'Картой онлайн', 'Наличные']);
            $table->text('address')->nullable();
            $table->unsignedBigInteger('user');
            $table->foreign('user')->references('id')->on('users');
            $table->enum('status', ['Новый', 'Подтвержден', 'Отклонен']);
            $table->text('adminComment')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
