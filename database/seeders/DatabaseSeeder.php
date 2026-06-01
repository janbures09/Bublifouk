<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = \App\Models\Category::factory(5)->create();

        foreach ($categories as $category) {
        \App\Models\Product::factory(10)->create([
            'category_id' => $category->id
        ]);
    }
    }
}
