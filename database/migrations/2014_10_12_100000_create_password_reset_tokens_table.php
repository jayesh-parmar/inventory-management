<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('password_reset_tokens', static function (Blueprint $blueprint) : void {
            $blueprint->string('email')->primary();
            $blueprint->string('token');
            $blueprint->timestamp('created_at')->nullable();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('password_reset_tokens');
    }
};
