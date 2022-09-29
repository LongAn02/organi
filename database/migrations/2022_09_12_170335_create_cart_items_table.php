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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quantity')->default(1)->unsigned();
            $table->unsignedBigInteger('shopping_session_id');
            $table->unsignedBigInteger('product_id');
            $table->timestamps();

            $table->foreign('shopping_session_id')->references('id')->on('shopping_sessions')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_items');
    }
};
