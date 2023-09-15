<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserResponsesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_responses')->insert([
            'id' => '1',
            'question_id' => '1',
            'unique_url' => '60da8147-9559-462a-9b22-f25003d77a31',
            'response_text' => 'hello@world.com', 
            'response_numeric' => null,
        ]);
        DB::table('user_responses')->insert([
            'id' => '2',
            'question_id' => '2',
            'unique_url' => '60da8147-9559-462a-9b22-f25003d77a31',
            'response_text' => '34', 
            'response_numeric' => null,
        ]);
        DB::table('user_responses')->insert([
            'id' => '3',
            'question_id' => '3',
            'unique_url' => '60da8147-9559-462a-9b22-f25003d77a31',
            'response_text' => 'Homme', 
            'response_numeric' => null,
        ]);
        DB::table('user_responses')->insert([
            'id' => '4',
            'question_id' => '4',
            'unique_url' => '60da8147-9559-462a-9b22-f25003d77a31',
            'response_text' => null, 
            'response_numeric' => 2,
        ]);
        DB::table('user_responses')->insert([
            'id' => '5',
            'question_id' => '5',
            'unique_url' => '60da8147-9559-462a-9b22-f25003d77a31',
            'response_text' => "Chirurgien", 
            'response_numeric' => null,
        ]);
        DB::table('user_responses')->insert([
            'id' => '6',
            'question_id' => '6',
            'unique_url' => '60da8147-9559-462a-9b22-f25003d77a31',
            'response_text' => "HTC Vive", 
            'response_numeric' => null,
        ]);
        DB::table('user_responses')->insert([
            'id' => '7',
            'question_id' => '7',
            'unique_url' => '60da8147-9559-462a-9b22-f25003d77a31',
            'response_text' => "SteamVR", 
            'response_numeric' => null,
        ]);
        DB::table('user_responses')->insert([
            'id' => '8',
            'question_id' => '8',
            'unique_url' => '60da8147-9559-462a-9b22-f25003d77a31',
            'response_text' => "Occulus Go", 
            'response_numeric' => null,
        ]);
        DB::table('user_responses')->insert([
            'id' => '9',
            'question_id' => '9',
            'unique_url' => '60da8147-9559-462a-9b22-f25003d77a31',
            'response_text' => null, 
            'response_numeric' => 4,
        ]);
        DB::table('user_responses')->insert([
            'id' => '10',
            'question_id' => '10',
            'unique_url' => '60da8147-9559-462a-9b22-f25003d77a31',
            'response_text' => "regarder des films", 
            'response_numeric' => null,
        ]);
        DB::table('user_responses')->insert([
            'id' => '11',
            'question_id' => '11',
            'unique_url' => '60da8147-9559-462a-9b22-f25003d77a31',
            'response_text' => null, 
            'response_numeric' => 2,
        ]);
        DB::table('user_responses')->insert([
            'id' => '12',
            'question_id' => '12',
            'unique_url' => '60da8147-9559-462a-9b22-f25003d77a31',
            'response_text' => null, 
            'response_numeric' => 2,
        ]);
        DB::table('user_responses')->insert([
            'id' => '13',
            'question_id' => '13',
            'unique_url' => '60da8147-9559-462a-9b22-f25003d77a31',
            'response_text' => null, 
            'response_numeric' => 3,
        ]);
        DB::table('user_responses')->insert([
            'id' => '14',
            'question_id' => '14',
            'unique_url' => '60da8147-9559-462a-9b22-f25003d77a31',
            'response_text' => null, 
            'response_numeric' => 1,
        ]);
        DB::table('user_responses')->insert([
            'id' => '15',
            'question_id' => '15',
            'unique_url' => '60da8147-9559-462a-9b22-f25003d77a31',
            'response_text' => null, 
            'response_numeric' => 5,
        ]);
        DB::table('user_responses')->insert([
            'id' => '16',
            'question_id' => '16',
            'unique_url' => '60da8147-9559-462a-9b22-f25003d77a31',
            'response_text' => "Oui", 
            'response_numeric' => null,
        ]);
        DB::table('user_responses')->insert([
            'id' => '17',
            'question_id' => '17',
            'unique_url' => '60da8147-9559-462a-9b22-f25003d77a31',
            'response_text' => "Oui", 
            'response_numeric' => null,
        ]);
        DB::table('user_responses')->insert([
            'id' => '18',
            'question_id' => '18',
            'unique_url' => '60da8147-9559-462a-9b22-f25003d77a31',
            'response_text' => null, 
            'response_numeric' => 5,
        ]);
        DB::table('user_responses')->insert([
            'id' => '19',
            'question_id' => '19',
            'unique_url' => '60da8147-9559-462a-9b22-f25003d77a31',
            'response_text' => null, 
            'response_numeric' => 3,
        ]);
        DB::table('user_responses')->insert([
            'id' => '20',
            'question_id' => '20',
            'unique_url' => '60da8147-9559-462a-9b22-f25003d77a31',
            'response_text' => "IA sous forme 3D", 
            'response_numeric' => null,
        ]);
        
    }
}
