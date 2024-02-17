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
        Schema::create('students_classes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_student')->constrained('students')->cascadeOnDelete();
            $table->foreignId('id_classe')->constrained('classes')->cascadeOnDelete();
            $table->string('annee_academique');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students_classes');
    }
};
