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
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->integer('bedrooms_count');
            $table->integer('bathroom_count');
            $table->integer('storey_count');
            $table->integer('garage_count');
            $table->float('price');

            $table->index(['name']);
            $table->index(['bedrooms_count']);
            $table->index(['bathroom_count']);
            $table->index(['storey_count']);
            $table->index(['garage_count']);
            $table->index(['price']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};
