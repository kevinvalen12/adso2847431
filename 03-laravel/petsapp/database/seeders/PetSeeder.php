<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pets')->insert([
            'name' => 'Firulais',
            'kind' => 'Dog',
            'weight' => '16',
            'age' => '23',
            'breed' => 'Shib Inu',
            'location' => 'kioro',
            'description' => 'Muy jugueton y cariñoso',
        ]);

        DB::table('pets')->insert([
            'name' => 'Michi',
            'kind' => 'Cat',
            'weight' => '3',
            'age' => '6',
            'breed' => 'Persa',
            'location' => 'legano',
            'description' => 'no le gusta hacer nada',
        ]);
    }
}
