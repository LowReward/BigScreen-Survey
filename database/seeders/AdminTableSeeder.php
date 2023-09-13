<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insertion des enregistrements dans la table 'admin'
        DB::table('admin')->insert([
            'name'=> 'admin',
            'email' => 'email@admin.com',
            'password' => bcrypt('password'),

        ]);
    }
}