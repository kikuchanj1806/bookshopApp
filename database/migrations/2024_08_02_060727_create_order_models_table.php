<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_models', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('phone');
            $table->string('address');
            $table->text('note')->nullable();
            $table->integer('cityId');
            $table->integer('districtId');
            $table->integer('wardId');
            $table->json('products'); // Lưu danh sách sản phẩm (id sản phẩm, số lượng, giá)
            $table->integer('created_by');
            $table->boolean('is_locked')->default(false); // Cờ để khóa đơn
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
        Schema::dropIfExists('order_models');
    }
}
