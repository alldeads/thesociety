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
            $table->bigInteger('company_id')->unsigned();
            $table->bigInteger('brand_id')->nullable()->unsigned();
            $table->bigInteger('category_id')->nullable()->unsigned();
            $table->bigInteger('sub_category_id')->nullable()->unsigned();
            $table->string('avatar')->nullable();
            $table->string('sku')->nullable();
            $table->string('name');
            $table->text('long_description')->nullable();
            $table->text('short_description')->nullable();
            $table->bigInteger('threshold')->default(0);
            $table->double('srp_price');
            $table->double('discounted_price')->nullable();
            $table->double('cost');
            $table->bigInteger('updated_by')->nullable()->unsigned();
            $table->bigInteger('created_by')->nullable()->unsigned();
            $table->enum('type', ['product', 'supply'])->default('product');
            $table->enum('status', ['published', 'unpublished', 'draft', 'new', 'in-stock', 'out-stock'])->default('published');
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
        Schema::dropIfExists('products');
    }
}
