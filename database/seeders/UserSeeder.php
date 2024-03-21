<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // //Creat a new user
        // $user = new \App\Models\User();
        // $user->name = 'Admin';
        // $user->phone = '085722929678';
        // $user->email = 'admin@gmail.com';
        // $user->password = bcrypt('admin1234');
        // $user->save();

        //Create multiple users menggunakan
        $user =[
            [
                'name' => 'Admin',
                'phone' => '081234567890',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'User',
                'phone' => '081234567891',
                'email' => 'user@gmail.com',
                'password' => bcrypt('123456'),
            ],

            [
                'name' => 'Trisna Wulandari',
                'phone' => '081234567892',
                'email' => 'trisnadiahayuwulandari@mail.ugm.ac.id',
                'password' => bcrypt('Wulandari2310'),
            ],

        ];

        //Insert the user into the database
        DB::table('users')->insert($user);
    }
}
