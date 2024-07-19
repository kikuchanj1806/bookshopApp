<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Tên danh mục
            $table->string('code')->unique(); // Mã danh mục
            $table->integer('parent_id');
            $table->boolean('status')->default(1); // Trạng thái danh mục (ẩn hoặc hiện)
            $table->string('image')->nullable(); // Hình ảnh danh mục
            $table->string('icon')->nullable(); // Icon danh mục
            $table->integer('order')->default(0); // Thứ tự danh mục
            $table->text('description')->nullable(); // Mô tả danh mục
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
        Schema::dropIfExists('product_categories');
    }
}
