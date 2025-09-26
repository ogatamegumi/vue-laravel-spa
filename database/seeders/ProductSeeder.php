<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Product::create([
                'name' => '商品' . $i,
                'description' => '説明文' . $i,
                'price' => ($i * 100),
                'options' => [
                    'color' => ['赤','青','黄'],
                    'size' => ['S','M','L']
                ],
                'is_active' => true,
            ]);
        }
    }
}
