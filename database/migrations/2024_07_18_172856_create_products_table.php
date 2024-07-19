<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name')->unique();
            $table->integer('typeId')->unsigned();
            $table->string('code')->unique();
            $table->decimal('price', 10, 2);
            $table->decimal('oldPrice', 10, 2)->nullable();
            $table->integer('quantity')->unsigned();
            $table->boolean('status');
            $table->unsignedBigInteger('categoryId');
            $table->string('brand')->nullable();
            $table->decimal('weight', 8, 2)->nullable();
            $table->decimal('width', 8, 2)->nullable();
            $table->decimal('length', 8, 2)->nullable();
            $table->decimal('height', 8, 2)->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('image')->nullable();
            $table->string('unit')->nullable();
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
            $table->string('video')->nullable();
            $table->boolean('showNew')->default(false);
            $table->boolean('showHot')->default(false);
            $table->boolean('showHome')->default(false);
            $table->text('promotionContent')->nullable();
            $table->decimal('promotionValue', 10, 2)->nullable();
            $table->timestamps();
            $table->foreign('categoryId')->references('id')->on('product_categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
