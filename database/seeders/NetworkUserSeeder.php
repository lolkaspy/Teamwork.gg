<?php

namespace Database\Seeders;

use App\Models\NetworkUser;
use Illuminate\Database\Seeder;

class NetworkUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NetworkUser::factory(25)->create();
    }
}
