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
            $table->unsignedBigInteger('question_id');
            $table->string('unique_url')->nullable();
            $table->text('response_text')->nullable(); // Pour les questions de type B
            $table->integer('response_numeric')->nullable(); // Pour les questions de type C
            $table->json('response_option_ids')->nullable(); // Pour les questions de type A
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
