<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Direction;
use App\Models\Matiere;
use App\Models\Note;
use App\Models\Professeur;
use App\Models\SchoolClass;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /*
         * Exemple de création d'un utilisateur avec le seeder par défaut
         * */
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'pape birame',
            'email' => 'sembenpape4@gmail.com',
            'password' => Hash::make('passer'),
            'profile_id'=>1
         ]);
        /*Direction::factory(1)->create();
        SchoolClass::factory(10)->create();
        Professeur::factory(10)->create();
        Student::factory(10)->create();
        Matiere::factory(10)->create();
        Note::factory(10)->create();*/

//         autre methode de création d'un etudiant sans passer par la factory
//         DB::table('students')->insert([
//             'firstname' => 'John',
//             'lastname' => 'Doe',
//             'class_id' => 1,
//         ]);

        // la methode call permet d'appeler d'autres seeders
        // $this->call([
        //     UserSeeder::class,
        //     SchoolClassSeeder::class,
        //     StudentSeeder::class,
        // ]);


    }
}
