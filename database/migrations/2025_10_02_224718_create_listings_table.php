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
        Schema::create('listings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('user_id')->constrained('customers')->onDelete('cascade'); // FK to customers table
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('brand_id')->constrained('brands')->onDelete('cascade');
            $table->string('model');
            $table->year('year');
            $table->decimal('price', 10, 2);
            $table->string('mileage');
            $table->string('location');
            $table->string('fuel_type');
            $table->string('transmission'); // 'Automatic' / 'Manual'
            $table->enum('condition', ['new', 'used']);
            $table->text('description');
            $table->boolean('is_featured')->default(false);
            $table->enum('status', ['active', 'pending', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
