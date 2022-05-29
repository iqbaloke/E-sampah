<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'full_name' => 'iqbal wahyudi',
            'username' => 'iqbalAn19',
            'gender' => 1,
            'email' => 'iqbaldeve@gmail.com',
            'password' => Hash::make('password'),
        ])->assignRole('super admin');

        User::create([
            'full_name' => 'fanny yusuf',
            'username' => 'fannyMa',
            'gender' => 1,
            'email' => 'fanny@gmail.com',
            'password' => Hash::make('password'),
        ])->assignRole('super admin');

        User::create([
            'full_name' => 'koordinator',
            'username' => 'koordinator',
            'gender' => 0,
            'email' => 'koordinator@gmail.com',
            'password' => Hash::make('password'),
        ])->assignRole('koordinator');

        User::create([
            'full_name' => 'user',
            'username' => 'user',
            'gender' => 1,
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
        ])->assignRole('user');
    }
}
