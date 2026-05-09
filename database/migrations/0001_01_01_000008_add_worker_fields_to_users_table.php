<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('user')->after('email');
            $table->string('passport_series')->nullable()->after('role');
            $table->string('passport_number')->nullable()->after('passport_series');
            $table->decimal('salary', 10, 2)->default(0)->after('passport_number');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'passport_series', 'passport_number', 'salary']);
        });
    }
};
