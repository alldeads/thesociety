<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journal_entries', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('company_id')->unsigned();
            $table->bigInteger('created_by')->unsigned();
            $table->bigInteger('updated_by')->nullable()->unsigned();
            $table->bigInteger('account_type_id')->unsigned();
            $table->bigInteger('payor')->unsigned();
            $table->text('account_no')->nullable();
            $table->text('check_no')->nullable();
            $table->date('posting_date');
            $table->double('credit')->default(0);
            $table->double('debit')->default(0);
            $table->text('description')->nullable();
            $table->text('notes')->nullable();
            $table->text('attachment')->nullable();
            $table->enum('status', ['confirmed', 'pending', 'hold', 'cancelled'])->default('confirmed');
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
        Schema::dropIfExists('journal_entries');
    }
}
