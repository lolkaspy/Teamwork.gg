<?php

namespace Database\Seeders;

use App\Models\TagUser;
use Illuminate\Database\Seeder;

class TagUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TagUser::factory(50)->create();
    }
}
