<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleArr = [
            [
                'name' => 'Администратор',
            ],
            [
                'name' => 'Создатель проекта',
            ],
            [
                'name' => 'Участник проекта',
            ],
            [
                'name' => 'Пользователь',
            ],
        ];

        foreach ($roleArr as $item) {
            $role = new Role($item);
            $role->save();
        }

    }
}
