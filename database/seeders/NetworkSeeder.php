<?php

namespace Database\Seeders;

use App\Models\Network;
use Illuminate\Database\Seeder;

class NetworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $networksArr = [
            [
                'name' => 'Telegram',
            ],
            [
                'name' => 'VK',
            ],
            [
                'name' => 'Discord',
            ],
            [
                'name' => 'Github',
            ],
        ];

        foreach ($networksArr as $item) {
            $network = new Network($item);
            $network->save();
        }
    }
}
