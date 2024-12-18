<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Faktor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(DistrikSeeder::class);
        $this->call(KelurahanSeeder::class);
        $this->call(PuskesmasSeeder::class);
        $this->call(StuntingSeeder::class);
        $this->call(FaktorSeeder::class);

    }
}
