<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Ensure storage/products folder exists
        Storage::disk('public')->makeDirectory('products');

        for ($i = 0; $i < 50; $i++) {
            $imageUrl = "https://picsum.photos/300/300?random=" . $i;
            $imageContents = file_get_contents($imageUrl);
            $imageName = 'products/' . Str::uuid() . '.jpg';

            Storage::disk('public')->put($imageName, $imageContents);

            Product::create([
                'name'        => $faker->words(3, true),
                'description' => $faker->sentence(12),
                'price'       => $faker->randomFloat(2, 50, 2000),
                'stock'       => $faker->numberBetween(5, 500),
                'category'    => $faker->randomElement(['Electronics', 'Clothing', 'Books', 'Home', 'Sports']),
                'image'       => $imageName, // saved in public storage
            ]);
        }
    }
}
