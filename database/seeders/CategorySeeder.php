<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            [
                'id' => 1,
                'title' => 'Без категории'
            ],
            [
                'id' => 2,
                'title' => 'Качели'
            ],
            [
                'id' => 3,
                'title' => 'Гамаки'
            ],
            [
                'id' => 4,
                'title' => 'Шезлонги'
            ],
            [
                'id' => 5,
                'title' => 'Детская кроватка'
            ],
            [
                'id' => 6,
                'title' => 'Панно'
            ]
        ]);
    }
}
