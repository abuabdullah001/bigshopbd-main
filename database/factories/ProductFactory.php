<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
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
        $name = $this->faker->unique()->name;
        $slug = Str::slug($name);
        
        $brandId = $this->faker->numberBetween(1, 10);

        $numCategories = $this->faker->numberBetween(1, 3);
        for ($i = 0; $i < $numCategories; $i++) {
            $categoryIds[] = $this->faker->numberBetween(1, 5);
        }

        $numImages = $this->faker->numberBetween(1, 3);
        $images = [];
        for ($i = 0; $i < $numImages; $i++) {
            $images[] = $this->faker->imageUrl();
        }
    
        return [
            'brand_id' => $brandId,
            'category_id' => implode(',', $categoryIds),
            'images' => implode(',', $images),
            'name' => $name,
            'slug' => $slug,
            'qty' => $this->faker->numberBetween(100, 700),
            'sku' => 'SKU' . strtoupper($this->faker->unique()->numberBetween(2000, 2800)),
            'regular_price' => $this->faker->numberBetween(1000, 5000),
            'discount_price' => $this->faker->numberBetween(800, 4300),
            'short_description' => $this->faker->sentence(40),
            'long_description' => $this->faker->sentence(500),
        ];
    }
}
