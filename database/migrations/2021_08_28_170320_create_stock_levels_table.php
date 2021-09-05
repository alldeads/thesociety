<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_levels', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->bigInteger('company_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('branch_id')->unsigned();
            $table->bigInteger('in_stock')->default(0);
            $table->bigInteger('after_stock')->default(0);
            $table->bigInteger('created_by')->unsigned();
            $table->bigInteger('updated_by')->unsigned();
            $table->softDeletes();
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
        Schema::dropIfExists('stock_levels');
    }
}
