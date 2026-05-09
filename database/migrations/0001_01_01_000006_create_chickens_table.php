<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chickens', function (Blueprint $table) {
            $table->id();
            $table->decimal('weight', 5, 2);
            $table->unsignedTinyInteger('age');
            $table->foreignId('breed_id')->constrained()->cascadeOnDelete();
            $table->unsignedInteger('monthly_eggs');
            $table->foreignId('cage_id')->nullable()->constrained()->unique()->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chickens');
    }
};
