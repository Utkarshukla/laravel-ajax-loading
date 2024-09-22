<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Electronics',
            'Furniture',
            'Clothing',
            'Books',
            'Toys',
        ];

        foreach ($categories as $categoryName) {
            $category = Category::create([
                'name' => $categoryName .' ' .fake()->company(),
                'slug' => Category::generateCategorySlug($categoryName),
                'image_path' => 'https://via.placeholder.com/150?text=' . Str::slug($categoryName), // Placeholder image
            ]);

            // Seed products for each category
            for ($i = 1; $i <= 10; $i++) {
                $productName = $categoryName . ' Product ' . $i .' ' ;
                Product::create([
                    'name' => $productName,
                    'slug' => Product::generateProductSlug($productName),
                    'description' => 'This is a description for ' . $productName,
                    'price' => rand(10, 500), // Random price between 10 and 500
                    'image_path' => 'https://via.placeholder.com/300?text=' . Str::slug($productName), // Placeholder image
                    'category_id' => $category->id,
                ]);
            }
        }
    }
}
