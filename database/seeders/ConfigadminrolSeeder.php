<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class ConfigadminrolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //usuario
        User::create([
            'name' => 'Oliver Gomez',
            'email' => 'kayserenrique@gmail.com',
            'password' => bcrypt('123456789'),
        ]);

        User::create([
            'name' => 'Marina Bolet',
            'email' => 'marianaboletmartinez@gmail.com',
            'password' => bcrypt('123456789'),
        ]);

        User::create([
            'name' => 'Dayana Martinez',
            'email' => 'dmaro006@gmail.com',
            'password' => bcrypt('123456789'),
        ]);
    }
}
