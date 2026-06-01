<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(3, true), // Název bublifuku
            'price' => fake()->randomFloat(2, 50, 1000), // Náhodná cena od 50 do 1000 Kč s dvěma desetinnými místy
            'volume' => fake()->randomElement(['150 ml', '500 ml', '1 litr', '5 litrů']), // Náhodně vybere jeden z těchto objemů
            'image_path' => null, // Obrázky budeme řešit až později, zatím necháme prázdné
        ];
    }
}
