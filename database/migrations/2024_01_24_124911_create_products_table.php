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
            $table->string('product_title');
            $table->float('product_price');
            $table->text('product_description');
            $table->integer('stock_quantity');
            $table->foreignId('sub_category_id')->constrained()->cascadeOnDelete()->default(0);
            $table->string('product_brand')->nullable();
            $table->string('product_image_URLs');
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
