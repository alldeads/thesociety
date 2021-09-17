<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('company_id')->unsigned();
            $table->bigInteger('order_id')->nullable();
            $table->bigInteger('invoice_id')->nullable();
            $table->bigInteger('payment_type_id')->unsigned();
            $table->string('transaction');
            $table->double('total')->default(0);
            $table->double('sub_total')->default(0);
            $table->double('balance')->default(0);
            $table->double('amount')->default(0);
            $table->double('discount')->default(0);
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
        Schema::dropIfExists('payments');
    }
}
