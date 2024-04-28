<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('weight_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('quality_id')->nullable();
            $table->unsignedBigInteger('gold_id')->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->text('content')->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->integer('featured_product')->nullable();
            $table->integer('new_arrivals')->nullable();
            $table->integer('rating')->nullable();
            $table->string('price')->nullable();
            $table->string('gst')->nullable();
            $table->string('total')->nullable();
            $table->boolean('status')->default(true);
            $table->foreign('weight_id')->references('id')->on('weights')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('quality_id')->references('id')->on('qualities')->onDelete('cascade');
            $table->foreign('gold_id')->references('id')->on('gold')->onDelete('cascade');
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
};
