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
            'body' => 'Votre âge',
            'type' => 'B',
            'options' => null,
        ]);

        DB::table('questions')->insert([
            'title' => 'Question 3',
            'body' => 'Votre Sexe ?',
            'type' => 'A', 
            'options' => json_encode(['Homme', 'Femme', 'Préfère de pas répondre']),
        ]);

        DB::table('questions')->insert([
            'title' => 'Question 4',
            'body' => 'Nombre de personne dans votre foyer (adulte & enfants)',
            'type' => 'C', 
            'options' => null,
        ]);

        DB::table('questions')->insert([
            'title' => 'Question 5',
            'body' => 'Votre Profession',
            'type' => 'B', 
            'options' => null,
        ]);

        DB::table('questions')->insert([
            'title' => 'Question 6',
            'body' => 'Quel marque de casque VR utilisez vous ?',
            'type' => 'A', 
            'options' => json_encode(['Occulus Rift/s', 'HTC Vive', 'Windows Mixed Reality', 'PSVR']),
        ]);

        DB::table('questions')->insert([
            'title' => 'Question 7',
            'body' => 'Sur quel magasin d’application achetez vous des contenus VR ?',
            'type' => 'A', 
            'options' => json_encode(['SteamVR', 'Occulus Store', 'Viveport', 'Playstation VR', 'Google Play', 'Windows Store']),
        ]);

        DB::table('questions')->insert([
            'title' => 'Question 8',
            'body' => 'Quel casque envisagez-vous d’acheter dans un futur proche ?',
            'type' => 'A', 
            'options' => json_encode(['Occulus Quest', 'Occulus Go', 'HTC Vive Pro', 'Autre', 'Aucun']),
        ]);

        DB::table('questions')->insert([
            'title' => 'Question 9',
            'body' => 'Au sein de votre foyer, combien de personne utilisent votre casque VR pour regarder Bigscreen ?',
            'type' => 'C', 
            'options' => null,
        ]);

        DB::table('questions')->insert([
            'title' => 'Question 10',
            'body' => 'Vous utilisez principalement Bigscreen pour :',
            'type' => 'A', 
            'options' => json_encode(['regarder des émissions TV en direct', 'regarder des films', 'jouer en solo', 'jouer en team']),
        ]);

        DB::table('questions')->insert([
            'title' => 'Question 11',
            'body' => 'Combien donnez vous de point pour la qualité de l’image sur Bigscreen ?',
            'type' => 'C', 
            'options' => null,
        ]);

        DB::table('questions')->insert([
            'title' => 'Question 12',
            'body' => 'Combien donnez vous de point pour le confort d’utilisation de l’interface Bigscreen ?',
            'type' => 'C', 
            'options' => null,
        ]);

        DB::table('questions')->insert([
            'title' => 'Question 13',
            'body' => 'Combien donnez vous de point pour la connection réseau de Bigscreen ?',
            'type' => 'C', 
            'options' => null,
        ]);

        DB::table('questions')->insert([
            'title' => 'Question 14',
            'body' => 'Combien donnez vous de point pour la qualité des graphismes 3D dans Bigscreen ?',
            'type' => 'C', 
            'options' => null,
        ]);

        DB::table('questions')->insert([
            'title' => 'Question 15',
            'body' => 'Combien donnez vous de point pour la qualité audio dans Bigscreen ?',
            'type' => 'C', 
            'options' => null,
        ]);

        DB::table('questions')->insert([
            'title' => 'Question 16',
            'body' => 'Aimeriez vous avoir des notifications plus précises au cours de vos sessions Bigscreen ?',
            'type' => 'A', 
            'options' => json_encode(['Oui', 'Non']),
        ]);

        DB::table('questions')->insert([
            'title' => 'Question 17',
            'body' => 'Aimeriez vous pouvoir inviter un ami à rejoindre votre session via son smartphone ?',
            'type' => 'A', 
            'options' => json_encode(['Oui', 'Non']),
        ]);

        DB::table('questions')->insert([
            'title' => 'Question 18',
            'body' => 'Aimeriez vous pouvoir enregistrer des émissions TV pour pouvoir les regarder ultérieurement ?',
            'type' => 'C', 
            'options' => null,
        ]);
        
        DB::table('questions')->insert([
            'title' => 'Question 19',
            'body' => 'Aimeriez vous jouer à des jeux exclusifs sur votre Bigscreen ?',
            'type' => 'C', 
            'options' => null,
        ]);

        DB::table('questions')->insert([
            'title' => 'Question 20',
            'body' => 'Quelle nouvelle fonctionnalité de vos rêve devrait exister sur Bigscreen ?',
            'type' => 'B', 
            'options' => null,
        ]);
    }
}
