<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBillOfLadingToOrderModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_models', function (Blueprint $table) {
            $table->string('billOfLading')->nullable(); // Thêm cột mới với kiểu dữ liệu và cho phép null
        });
    }

    public function down()
    {
        Schema::table('order_models', function (Blueprint $table) {
            $table->dropColumn('billOfLading'); // Xóa cột trong phương thức down
        });
    }
}
