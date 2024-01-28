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
            $table->increments('id');
            $table->date('date');
            $table->string('product_id');
            $table->string('product_name');
            $table->string('supplier_id')->nullable();
            $table->string('supplier_name')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('customer_name')->nullable();
            $table->double('quantity_price',10,2)->default(0.0);
            $table->integer('quantity');
            $table->double('buy_price',10,2)->default(0.0);
            $table->double('sell_price',10,2)->default(0.0);
            $table->double('total_sales',10,2)->default(0.0);
            $table->integer('available_quantity')->default(0);
            $table->double('profit',10,2)->default(0.0);
            $table->double('loss',10,2)->default(0.0);
            $table->double('total_amount',10,2)->default(0.0);
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
