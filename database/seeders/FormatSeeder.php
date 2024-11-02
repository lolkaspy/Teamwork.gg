<?php

namespace Database\Seeders;

use App\Models\Format;
use Illuminate\Database\Seeder;

class FormatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $formatArr = [
            [
                'name' => 'Дистанционный',
            ],
            [
                'name' => 'Очный',
            ],
            [
                'name' => 'Смешанный',
            ],
        ];

        foreach ($formatArr as $item) {
            $format = new Format($item);
            $format->save();
        }
    }
}
