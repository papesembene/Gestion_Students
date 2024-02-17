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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('firstname', 100); // cree une colonne firstname de type string de taille 100
            $table->string('lastname', 100);  // cree une colonne lastname de type string de taille 100
            $table->string('image')->nullable();
            $table->string('email')->unique();
            $table->string('telephone');
            $table->string('birthday');
            $table->string('lieu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
