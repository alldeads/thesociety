<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_histories', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->bigInteger('company_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('branch_id')->unsigned();
            $table->bigInteger('inventory_type_id')->unsigned();
            $table->bigInteger('in_stock')->default(0);
            $table->bigInteger('difference')->default(0);
            $table->bigInteger('on_hand')->default(0);
            $table->boolean('type')->default(1);
            $table->bigInteger('created_by')->unsigned();
            $table->bigInteger('updated_by')->unsigned();
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
        Schema::dropIfExists('inventory_histories');
    }
}
