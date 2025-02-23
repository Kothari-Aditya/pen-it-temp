<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = collect(['Sports', 'Technology', 'Fashion', 'Entertainment', 'Food']);
        $categories->each(function($categoryName) {
            Category::create(['name' => $categoryName]);
        });
    }
}
