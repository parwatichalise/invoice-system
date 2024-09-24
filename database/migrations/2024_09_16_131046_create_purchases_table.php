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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplier_id')->constrained('suppliers')->cascadeOnDelete(); // Foreign key to supplier
            $table->string('chalan_no');
            $table->string('product_name');
            $table->integer('stock_quantity');
            $table->date('expiry_date')->nullable();
            $table->string('batch_no')->nullable();
            $table->integer('quantity');
            $table->decimal('rate', 8, 2);
            $table->decimal('discount_percentage', 5, 2)->nullable();
            $table->decimal('grand_total', 10, 2);
            $table->enum('payment_type', ['cash', 'credit']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
