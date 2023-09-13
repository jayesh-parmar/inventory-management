<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->unique();
            $table->foreignUuid('brand_id')->nullable()->constrained();
            $table->foreignUuid('color_id')->nullable()->constrained();
            $table->foreignUuid('size_id')->nullable()->constrained();
            $table->boolean('status')->nullable();
            $table->timestamps();
        });
    }
};