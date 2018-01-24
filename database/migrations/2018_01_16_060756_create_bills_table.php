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
            $table->float('total_amount')->nullable();
            $table->float('cgst_amount')->nullable();
            $table->float('sgst_amount')->nullable();
            $table->float('gst_5_amount')->nullable();
            $table->float('gst_12_amount')->nullable();
            $table->float('gst_18_amount')->nullable();
            $table->float('gst_28_amount')->nullable();
            $table->float('coin_adjustment')->nullable();
            $table->float('net_amount')->nullable();
            $table->date('bill_date');
            $table->string('type')->nullable();
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
