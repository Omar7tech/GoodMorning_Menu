<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('description')->nullable();
            $table->integer('sort')->default(0)->nullable();
            $table->boolean('active')->default(true);
            $table->boolean('featured')->default(false);
            $table->boolean('new')->default(false);
            $table->foreignId(column: 'category_id')->nullable()->index()->constrained('categories', 'id')->cascadeOnDelete();
            $table->decimal('price', 10, 2)->default(0);
            $table->json('variations')->nullable();
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
