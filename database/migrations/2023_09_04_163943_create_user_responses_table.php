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
        Schema::create('user_responses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('question_id'); // ID de la question lié
            $table->string('unique_url')->nullable(); // UUID stocké, propre à un formulaire
            $table->text('response_text')->nullable(); // Pour les questions de type A et B puisque l'énoncé demande à afficher les réponses en texte
            $table->integer('response_numeric')->nullable(); // Pour les questions de type C - plus simple d'avoir un int pour calculer la moyenne
            $table->timestamps();
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_responses');
    }
};
