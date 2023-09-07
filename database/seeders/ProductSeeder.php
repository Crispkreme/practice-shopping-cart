<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = FakerFactory::create();

        for ($i = 0; $i < 30; $i++) {
            $product = [
                'name' => $faker->unique()->word,
                'details' => $faker->sentence,
                'description' => $faker->paragraph,
                'brand' => $faker->company,
                'price' => $faker->randomFloat(2, 10, 100),
                'shipping_cost' => $faker->randomFloat(2, 1, 10),
            ];
            \DB::table('products')->insert($product);
        }
    }
}
