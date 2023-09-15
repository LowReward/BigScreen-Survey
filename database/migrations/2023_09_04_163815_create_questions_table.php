<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Crée une nouvelle table 'questions' dans la base de données
        Schema::create('questions', function (Blueprint $table) {
            $table->id(); // Colonne ID auto-incrémentée pour chaque question
            $table->string('title'); // Colonne pour le titre de la question (chaine de caractères)
            $table->text('body'); // Colonne pour le corps de la question (texte)
            $table->enum('type', ['A', 'B', 'C']); // Colonne pour le type de question (A, B ou C)
            $table->json('options')->nullable(); // Colonne pour les options de réponse (JSON, nullable)
            $table->timestamps(); // Colonne pour les horodatages de création et de mise à jour
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Supprime la table 'questions' de la base de données si elle existe
        Schema::dropIfExists('questions');
    }
};
