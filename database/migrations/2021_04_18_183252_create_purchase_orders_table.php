<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('company_id')->unsigned();
            $table->string('reference');
            $table->string('ship_via')->nullable();
            $table->string('shipping_method')->nullable();
            $table->string('shipping_terms')->nullable();
            $table->string('fob')->nullable();
            $table->text('notes')->nullable();
            $table->decimal('sub_total', 12, 2);
            $table->decimal('total', 12, 2);
            $table->decimal('discount', 12, 2)->default(0);
            $table->decimal('shipping', 12, 2);
            $table->decimal('tax', 12, 2)->default(0);
            $table->date('delivery_date')->nullable();
            $table->bigInteger('status_id')->nullable();
            $table->bigInteger('approved_by')->nullable()->unsigned();
            $table->bigInteger('updated_by')->nullable()->unsigned();
            $table->bigInteger('created_by')->nullable()->unsigned();
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
        Schema::dropIfExists('purchase_orders');
    }
}
