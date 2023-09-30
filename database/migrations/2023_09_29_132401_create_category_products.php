<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('category_product', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('product_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->timestamps();   
        });
    }
};
