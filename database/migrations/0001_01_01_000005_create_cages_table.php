<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('workshop_id')->constrained()->cascadeOnDelete();
            $table->unsignedInteger('row');
            $table->unsignedInteger('number');
            $table->timestamps();

            $table->unique(['workshop_id', 'row', 'number']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cages');
    }
};
