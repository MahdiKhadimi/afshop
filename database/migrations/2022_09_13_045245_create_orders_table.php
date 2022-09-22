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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('size')->nullable();
            $table->integer('color')->nullable();
            $table->integer('quantity')->nullable();
            $table->unsignedBigInteger('delivery_id');
            $table->string('payment_method');
            $table->tinyInteger('status')->default(1);
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->cascadeOnDelete()
            ->cascadeOnUpdate(); 
            $table->foreign('delivery_id')
            ->references('id')->on('deliveries')
            ->cascadeOnUpdate();
            $table->foreign('product_id')
            ->references('id')->on('products')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
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
