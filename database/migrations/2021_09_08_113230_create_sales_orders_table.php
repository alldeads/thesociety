<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_orders', function (Blueprint $table) {    
            $table->id();
            $table->string('reference');
            $table->bigInteger('company_id')->unsigned();
            $table->bigInteger('customer_id')->nullable();
            $table->double('total')->default(0);
            $table->double('sub_total')->default(0);
            $table->double('discount')->default(0);
            $table->bigInteger('quantity')->default(0);
            $table->enum('type', ['guest', 'customer'])->default('guest');
            $table->bigInteger('created_by')->unsigned();
            $table->bigInteger('updated_by')->unsigned();
            $table->string('status');
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('sales_orders');
    }
}
