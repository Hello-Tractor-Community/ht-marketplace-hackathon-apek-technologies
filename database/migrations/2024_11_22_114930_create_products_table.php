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
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('path');
            $table->string('price');
            $table->unsignedBigInteger('brand_id');
            $table->string('description');
            $table->string('category')->nullable();
            $table->string('engine_hours')->nullable();
            $table->string('yop');
            $table->integer('qty')->default(1);
            $table->longText('shipping')->nullable();
            $table->string('implement')->nullable();
            $table->boolean('isAvailable')->default(true);
            $table->boolean('isApproved')->default(false);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('brand_id')->references('id')->on('brands');
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
