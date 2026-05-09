<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('breeds', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->unsignedInteger('average_monthly_eggs')->default(0);
            $table->decimal('average_weight', 5, 2)->default(0);
            $table->unsignedTinyInteger('diet_number')->default(1);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('breeds');
    }
};
