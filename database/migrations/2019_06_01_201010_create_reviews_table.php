<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->string('user_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->float('point');
            $table->boolean('is_approved')->default(0)->comment('0 => unapproved, 1 => approved');
            

            $table->foreign('product_id')
              ->references('id')->on('products')
              ->onDelete('cascade');

            $table->foreign('user_id')
              ->references('id')->on('users')
              ->onDelete('cascade');

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
        Schema::dropIfExists('reviews');
    }
}
