<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            FormatSeeder::class,
            AgeLimitSeeder::class,
            ProjectSeeder::class,
            NetworkSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            TagSeeder::class,
            RoleUserSeeder::class,
            NetworkUserSeeder::class,
            ProjectTagSeeder::class,
            TagUserSeeder::class,
            NewsSeeder::class,
        ]);
    }
}
