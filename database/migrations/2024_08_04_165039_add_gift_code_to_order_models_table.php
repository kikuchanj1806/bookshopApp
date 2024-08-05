<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGiftCodeToOrderModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_models', function (Blueprint $table) {
            $table->string('gift_code')->nullable()->after('billOfLading');
        });
    }

    public function down()
    {
        Schema::table('order_models', function (Blueprint $table) {
            $table->dropColumn('gift_code');
        });
    }
}
