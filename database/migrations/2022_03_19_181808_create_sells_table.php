<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sells', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->string('store_id')->nullable();
            $table->string('sell_price')->nullable();
            $table->string('total_cost')->nullable();
            $table->string('total_profit')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('set null');
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('set null');
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('sells');
    }
}
