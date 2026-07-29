<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * This function creates the 'products' table in the database.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->string('name'); // Name of the shoe
            $table->decimal('price', 8, 2); // Price, max 999,999.99
            $table->string('image'); // Image file path, stored in 'storage/app/public'
            $table->timestamps(); // Created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     * This function drops the 'products' table if it exists.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
