<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\ProductImages;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductImages::insert([
            [
                'product_id' => 1,
                'file_path' => '/images/Comfort/Comfort_1.jpg'
            ],
            [
                'product_id' => 1,
                'file_path' => '/images/Comfort/Comfort_2.jpg'
            ],
            [
                'product_id' => 1,
                'file_path' => '/images/Comfort/Comfort_3.jpg'
            ],
            [
                'product_id' => 2,
                'file_path' => '/images/Gamak_ajur/Gamak_ajur_1.jpg'
            ],
            [
                'product_id' => 2,
                'file_path' => '/images/Gamak_ajur/Gamak_ajur_2.jpg'
            ],
            [
                'product_id' => 2,
                'file_path' => '/images/Gamak_ajur/Gamak_ajur_3.jpg'
            ],
            [
                'product_id' => 2,
                'file_path' => '/images/Gamak_ajur/Gamak_ajur_4.jpg'
            ],
            [
                'product_id' => 3,
                'file_path' => '/images/Chezlong/Chezlong_1.jpg'
            ],
            [
                'product_id' => 3,
                'file_path' => '/images/Chezlong/Chezlong_2.jpg'
            ],
            [
                'product_id' => 3,
                'file_path' => '/images/Chezlong/Chezlong_3.jpg'
            ],
            [
                'product_id' => 3,
                'file_path' => '/images/Chezlong/Chezlong_4.jpg'
            ],
            [
                'product_id' => 4,
                'file_path' => '/images/Panno/Panno_1.jpg'
            ],
            [
                'product_id' => 5,
                'file_path' => '/images/Colubel/Colubel_1.jpg'
            ],
            [
                'product_id' => 5,
                'file_path' => '/images/Colubel/Colubel_2.jpg'
            ],
            [
                'product_id' => 5,
                'file_path' => '/images/Colubel/Colubel_3.jpg'
            ],
            [
                'product_id' => 5,
                'file_path' => '/images/Colubel/Colubel_4.jpg'
            ],
            [
                'product_id' => 6,
                'file_path' => '/images/Kacheli/Kacheli_1.jpg'
            ],
            [
                'product_id' => 6,
                'file_path' => '/images/Kacheli/Kacheli_2.jpg'
            ],
            [
                'product_id' => 6,
                'file_path' => '/images/Kacheli/Kacheli_3.jpg'
            ],
            [
                'product_id' => 6,
                'file_path' => '/images/Kacheli/Kacheli_4.jpg'
            ],
            [
                'product_id' => 7,
                'file_path' => '/images/Kacheli_boho/Kacheli_boho_1.jpg'
            ],
            [
                'product_id' => 7,
                'file_path' => '/images/Kacheli_boho/Kacheli_boho_2.jpg'
            ],
            [
                'product_id' => 7,
                'file_path' => '/images/Kacheli_boho/Kacheli_boho_3.jpg'
            ],
            [
                'product_id' => 7,
                'file_path' => '/images/Kacheli_boho/Kacheli_boho_4.jpg'
            ],
            [
                'product_id' => 8,
                'file_path' => '/images/Gamak_premium/Gamak_premium_1.jpg'
            ],
            [
                'product_id' => 8,
                'file_path' => '/images/Gamak_premium/Gamak_premium_2.jpg'
            ],
            [
                'product_id' => 8,
                'file_path' => '/images/Gamak_premium/Gamak_premium_3.jpg'
            ],
            [
                'product_id' => 8,
                'file_path' => '/images/Gamak_premium/Gamak_premium_4.jpg'
            ],
        ]);
    }
}
