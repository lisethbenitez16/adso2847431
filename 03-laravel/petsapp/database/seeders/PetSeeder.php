<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pets')->insert([
            'name'       => 'Firulais',
            'kind'       => 'Dog',
            'weight'     => '16',
            'age'        => '24',
            'breed'      => 'Shiba Inu',
            'location'   => 'Kioto',
            'description'=> 'Their coat is typically light-colored with darker points, and they are often very social, affectionate, and talkative, forming strong bonds with their owners.',
            'created_at' => now()
        ]);

        DB::table('pets')->insert([
            'name'       => 'Michi',
            'kind'       => 'Cat',
            'weight'     => '4',
            'age'        => '18',
            'breed'      => 'Siamés',
            'location'   => 'Osaka',
            'description'=> 'A Siamese cat is a sleek and elegant breed known for its striking appearance and vocal personality. ',
            'created_at' => now()
        ]);

        DB::table('pets')->insert([
            'name'       => 'Killer',
            'kind'       => 'Dog',
            'weight'     => '5',
            'age'        => '48',
            'breed'      => 'French Poodle',
            'location'   => 'Tokio',
            'description'=> ' They have a slender, muscular body, large almond-shaped blue eyes, and a short coat with color points on the ears, face, paws, and tail.',
            'created_at' => now()
        ]);
    }
}
