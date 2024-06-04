<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Diyata',
            'email' => 'diyata@gmail.com',
            'password' => Hash::make('Try123!'),
        ]);
        User::create([
            'name' => 'Diwata',
            'email' => 'diwata@gmail.com',
            'password' => Hash::make('Try123!'),
        ]);
        User::create([
            'name' => 'Malupiton',
            'email' => 'malupiton@gmail.com',
            'password' => Hash::make('Try123!'),
        ]);
        User::create([
            'name' => 'Tanggol',
            'email' => 'tanggol@gmail.com',
            'password' => Hash::make('Try123!'),
        ]);
        User::create([
            'name' => 'lillusis',
            'email' => 'lillusis@gmail.com',
            'password' => Hash::make('Try123!'),
        ]);
    }
}
