<?php

namespace Database\Seeders;

use App\Models\AgeLimit;
use Illuminate\Database\Seeder;

class AgeLimitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ageLimitArr = [
            [
                'limit' => '16+',
            ],
            [
                'limit' => '18+',
            ],
            [
                'limit' => '35+',
            ],
        ];

        foreach ($ageLimitArr as $item) {
            $ageLimit = new AgeLimit($item);
            $ageLimit->save();
        }
    }
}
