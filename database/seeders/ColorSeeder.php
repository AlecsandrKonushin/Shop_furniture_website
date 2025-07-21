<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Color::insert([
            [
                'id' => 1,
                'title' => 'Тёмно зелёный',
                'color' => '747950',
            ],
            [
                'id' => 2,
                'title' => 'Зелёный',
                'color' => 'a4c58e',
            ],
            [
                'id' => 3,
                'title' => 'Молочный',
                'color' => 'e5e3e4',
            ],
            [
                'id' => 4,
                'title' => 'Коричневый',
                'color' => '7c5f3d',
            ],
            [
                'id' => 5,
                'title' => 'Чёрный',
                'color' => '040605',
            ],
            [
                'id' => 6,
                'title' => 'Серый',
                'color' => 'cecccd',
            ],
            [
                'id' => 7,
                'title' => 'Бардовый',
                'color' => '8b294f',
            ],
        ]);
    }
}
