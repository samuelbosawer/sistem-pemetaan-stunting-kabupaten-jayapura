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
        $admin = User::create([
            // 'user' => 'Admin',
            'name' => 'Admin Dinas',
            'email' => 'admindinas@gmail.com',
            'password' =>  bcrypt('admindinas@gmail.com')
        ]);
        $admin->assignRole('admindinas');

        $admin = User::create([
            // 'user' => 'Admin',
            'name' => 'Admin Puskesmas',
            'email' => 'adminpuskesmas@gmail.com',
            'password' =>  bcrypt('adminpuskesmas@gmail.com')
        ]);
        $admin->assignRole('adminpuskesmas');

        $admin = User::create([
            // 'user' => 'Admin',
            'name' => 'Kepala Dinas',
            'email' => 'kepaladinas@gmail.com',
            'password' =>  bcrypt('kepaladinas@gmail.com')
        ]);
        $admin->assignRole('kepaladinas');


    }
}
