<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsPayablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts_payables', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('company_id')->unsigned()->index();
            $table->bigInteger('created_by')->unsigned();
            $table->bigInteger('updated_by')->nullable()->unsigned();
            $table->bigInteger('account_type_id')->unsigned()->index();
            $table->bigInteger('payor')->unsigned()->index();
            $table->text('account_no')->nullable();
            $table->text('check_no')->nullable();
            $table->date('posting_date');
            $table->double('amount')->default(0);
            $table->text('description')->nullable();
            $table->text('notes')->nullable();
            $table->text('attachment')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('accounts_payables');
    }
}
