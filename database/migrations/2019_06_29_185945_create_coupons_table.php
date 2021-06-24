<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title'); 
            $table->string('code')->unique();
            $table->text('description')->nullable();
            $table->boolean('is_order_discount')->default(1)->comment('0=Item Discount, 1=Order Discount');
            $table->float('discount_amount');
            $table->float('criteria_amount');
            $table->boolean('direct_amount_or_percentage')->default(1)->comment('1=>Direct Amount, 0=>Percentage Amount');
            $table->integer('total_quantity')->default(1)->comment('Total Coupon Quantity');
            $table->date('valid_date')->nullable();
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
        Schema::dropIfExists('coupons');
    }
}
