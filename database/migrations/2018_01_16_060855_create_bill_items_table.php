<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bill_id');
            //$table->integer('item_id')->nullable();
            $table->integer('stock_id');
            $table->integer('quantity');
            $table->float('rate');
            $table->float('discount');
            $table->float('gst');
            $table->float('amount');
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
        Schema::dropIfExists('bill_items');
    }
}
