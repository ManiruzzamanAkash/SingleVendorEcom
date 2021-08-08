<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            
            $table->boolean('show_navbar')->default(false);
            $table->boolean('show_homepage')->default(false);
            $table->unsignedTinyInteger('navbar_priority')->default(1);
            $table->unsignedTinyInteger('homepage_priority')->default(1);
            $table->boolean('status')->default(1);

            $table->string('sub_header');
            $table->string('slider_name');
            $table->string('slider_slogan');
            $table->integer('show_homepage')->default(1);
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->integer('parent_id')->nullable();
            $table->string('bg_color', 20)->default('transparent');
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
        Schema::dropIfExists('categories');
    }
}
