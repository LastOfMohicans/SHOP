<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()->count(120)->create();

        $faker = Factory::create();

        Product::all()->each(function($product) use ($faker) {
            $product->slug = Str::of($product->title)->slug('-');
            $product->save();

            $categories = [];

            for ($i=0; $i < 4; $i++) { 
                $categories[] = $faker->numberBetween(1, 5);
            }

            $product->categories()->sync($categories);
        });
    }
}
