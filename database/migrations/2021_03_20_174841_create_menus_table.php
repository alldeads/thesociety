<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_menu_id')->nullable();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('url')->nullable();
            $table->string('icon')->nullable();
            $table->string('base')->nullable();
            $table->boolean('is_export')->default(true);
            $table->string('classList')->nullable();
            $table->string('permission');
            $table->integer('order')->nullable();
            $table->timestamps();

            $table->foreign('parent_menu_id')->references('id')->on('menus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
