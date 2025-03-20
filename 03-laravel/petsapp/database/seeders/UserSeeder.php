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
        $user = new User; /* user es el modelo*/ 
        $user->document  = 75000001;
        $user->fullname  = 'John Wick';
        $user->gender    = 'Male';
        $user->birthdate = '1984-10-12';
        $user->phone     = '3205673456';
        $user->email     = 'jwick@gmail.com';
        $user->password  = bcrypt('admin'); /*bcrypt encripta una contraseña*/ 
        $user->role = 'Admin';
        $user->save();

/* la variable se puede re-declarar , no es necesario usuario1, o usuario2*/ 

        $user = new User; 
        $user->document  = 75000002;
        $user->fullname  = 'Lara Croft';
        $user->gender    = 'Female';
        $user->birthdate = '1994-08-05';
        $user->phone     = '3209890976';
        $user->email     = 'lara@gmail.com';
        $user->password  = bcrypt('12345'); 
        $user->save();
    }
}
