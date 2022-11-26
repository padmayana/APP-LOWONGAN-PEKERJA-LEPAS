<?php

namespace Database\Seeders;

use App\Models\User;


use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        User::create(
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'lahir' => '2022-07-07',
                'level' => 'Admin',
                'notlp' => 'Admin',
                'kelamin' => 'Admin',
                'daerah' => 'Admin',
                'image' => 'profile-images/Master.png',
            ]
        );
        User::create(
            [
                'name' => 'Budi',
                'email' => 'budi@gmail.com',
                'password' => Hash::make('user'),
                'lahir' => '2022-07-07',
                'level' => 'freelancer',
                'notlp' => '0851234578',
                'kelamin' => 'Pria',
                'daerah' => 'Badung',
                'image' => 'profile-images/Master.png',
            ]
        );
        User::create(
            [
                'name' => 'Joni Van Houten',
                'email' => 'Joni@gmail.com',
                'password' => Hash::make('user'),
                'lahir' => '2022-07-07',
                'level' => 'freelancer',
                'notlp' => '0851234578',
                'kelamin' => 'Pria',
                'daerah' => 'Tabanan',
                'image' => 'profile-images/Master.png',
            ]
        );
    }
}
