<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Purchase::create([
                'product_id'   => $i,
                'quantity'     => rand(1, 5),
                'perchased_at' => Carbon::today()->subDays(rand(0, 30)),
            ]);
        }
    }
}
