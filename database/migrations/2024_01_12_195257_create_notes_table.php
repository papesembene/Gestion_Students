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
        Schema::create('notes', function (Blueprint $table) {
            /*$table->id();
            $table->foreignIdFor(\App\Models\Student::class)->constrained('etudiants');
            $table->foreignId('matiere_id')->constrained('matieres');
            $table->integer('note');
            $table->string('appreciation');
            $table->string('periode');
            $table->string('year');
            $table->string('session');
            $table->string('type');
            $table->string('coeff');
            $table->timestamps();*/
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
