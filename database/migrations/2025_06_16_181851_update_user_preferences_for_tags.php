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
        Schema::table('user_preferences', function (Blueprint $table) {
            $table->dropColumn('service_id'); // jika sudah tidak dipakai
            $table->string('tag')->after('user_id'); // tambah kolom tag
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_preferences', function (Blueprint $table) {
            $table->dropColumn('tag');
            $table->unsignedBigInteger('service_id')->after('user_id');
        });
    }
};
