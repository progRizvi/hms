<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create
        ([
        'name'=>'Nahar',
        'email'=>'nahar@gmail.com',
        'password' =>bcrypt('123456')
        ]);
        User::create
        ([
            'name'=>'Akhi',
        'email'=>'akhi@gmail.com',
        'password' =>bcrypt('123456')
        ]);
        User::create
        ([
        'name'=>'Admin',
        'email'=>'admin@gmail.com',
        'password' =>bcrypt('123456')
        ]);
    }
}
