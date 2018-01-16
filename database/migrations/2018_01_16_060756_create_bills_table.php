<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id');
            $table->float('total_amount');
            $table->float('cgst_amount');
            $table->float('sgst_amount');
            $table->float('gst_5_amount');
            $table->float('gst_12_amount');
            $table->float('gst_18_amount');
            $table->float('gst_28_amount');
            $table->float('coin_adjustment');
            $table->float('net_amount');
            $table->date('bill_date');
            $table->string('type');
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
        Schema::dropIfExists('bills');
    }
}
