<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('brand_id');
            $table->string('title');
            $table->string('occation')->nullable();
            $table->string('slogan')->nullable();
            $table->unsignedInteger('delivery_time')->default(4320)->comment('eg; time in minutes 4320 minutes = 3 days');
            $table->text('description')->nullable();
            $table->string('slug');
            $table->unsignedInteger('quantity')->default(1);
            $table->unsignedFloat('price')->default(0);
            $table->boolean('status')->default(0);
            $table->unsignedFloat('offer_price')->nullable();
            $table->unsignedFloat('discount')->nullable();
            $table->enum('discount_type', ['percentage', 'numeric'])->default('percentage');
            $table->string('warranty')->nullable();
            $table->unsignedInteger('admin_id');
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
