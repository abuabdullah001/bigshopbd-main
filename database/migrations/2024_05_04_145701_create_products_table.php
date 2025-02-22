<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->text('brand_id')->nullable();
            $table->text('category_id')->nullable();
            $table->text('images')->nullable();
            $table->string('name')->unique();
            $table->string('slug');
            $table->integer('qty');
            $table->string('sku')->unique();
            $table->integer('regular_price');
            $table->integer('discount_price');
            $table->longText('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
