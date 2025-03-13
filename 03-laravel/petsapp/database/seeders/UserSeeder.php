<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $user = new User();
        $user->document = '1000000000';
        $user->fullname = 'Sigar Persa';
        $user->gender = 'Male';
        $user->birthdate = '2005-01-01';
        $user->phone = '3023001234';
        $user->email = 'persaSi@gmail.com';
        $user->password = bcrypt('12345678');
        $user->role = 'admin';
        $user->save();

        $user = new User();
        $user->document = '1000000001';
        $user->fullname = 'Miral Sinor';
        $user->gender = 'Female';
        $user->birthdate = '2004-02-01';
        $user->phone = '3023001235';
        $user->email = 'Miral@gmail.com';
        $user->password = bcrypt('87654321');
        $user->save();
    }
}
