<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('log_user', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_user');
            $table->json('action');
            $table->string('method');
            $table->ipAddress('ip_address');
            $table->text('user_agent');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('log_user');
    }
};

