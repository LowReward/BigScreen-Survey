<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Appelle les seeders spécifiques pour remplir les tables correspondantes
        $this->call(AdminTableSeeder::class); // Appelle le seeder pour la table 'admins'
        $this->call(QuestionsTableSeeder::class); // Appelle le seeder pour la table 'questions'
        $this->call(UserResponsesTableSeeder::class); // Appelle le seeder pour la table 'user_responses'
    }
}
