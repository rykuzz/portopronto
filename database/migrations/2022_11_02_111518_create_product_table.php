<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id');
            $table->string('name');
            $table->string('slug');
            $table->mediumText('slogan');
            $table->longText('detail');
            $table->string('price');
            $table->string('image');
            $table->string('qty');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('popular')->default(0);
            $table->string('title');
            $table->string('keyword');
            $table->string('meta_dec');
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
        Schema::dropIfExists('product');
    }
}
