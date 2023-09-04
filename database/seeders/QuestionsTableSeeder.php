<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('questions')->insert([
            'title' => 'Question 1',
            'body' => 'Votre Adresse Email',
            'type' => 'B',
            'options' => null,
        ]);

        DB::table('questions')->insert([
            'title' => 'Question 2',
            'body' => 'Nombre de personne dans votre foyer (adulte & enfants)',
            'type' => 'C', 
            'options' => null,
        ]);

        DB::table('questions')->insert([
            'title' => 'Question 3',
            'body' => 'Votre Sexe ?',
            'type' => 'A', 
            'options' => json_encode(['Homme', 'Femme', 'Préfère de pas répondre']),
        ]);
    }
}
