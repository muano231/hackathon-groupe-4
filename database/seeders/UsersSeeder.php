<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'alexandra@admin.com',
            'password' => Hash::make('password'),
        ])->assignRole('admin');

        User::create([
            'name' => 'Admin',
            'email' => 'leo@admin.com',
            'password' => Hash::make('password'),
        ])->assignRole('admin');

        User::create([
            'name' => 'Admin',
            'email' => 'arthur@admin.com',
            'password' => Hash::make('password'),
        ])->assignRole('admin');

        User::create([
            'name' => 'Admin',
            'email' => 'gabriel@admin.com',
            'password' => Hash::make('password'),
        ])->assignRole('admin');

        User::create([
            'name' => 'Testeur',
            'email' => 'alexandra@testeur.com',
            'password' => Hash::make('password'),
        ])->assignRole('testeur');

        User::create([
            'name' => 'Testeur',
            'email' => 'leo@testeur.com',
            'password' => Hash::make('password'),
        ])->assignRole('testeur');

        User::create([
            'name' => 'Testeur',
            'email' => 'arthur@testeur.com',
            'password' => Hash::make('password'),
        ])->assignRole('testeur');

        User::create([
            'name' => 'Testeur',
            'email' => 'gabriel@testeur.com',
            'password' => Hash::make('password'),
        ])->assignRole('testeur');



    }
}
