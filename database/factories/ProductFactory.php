<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $categoriesIds = Category::pluck('id')->all();

        return [
            'name'        => $this->faker->words(1, true),
            'slug'        => $this->faker->unique()->slug(),
            'description' => $this->faker->text(25),
            'sort'        => 0,
            'active'      => $this->faker->boolean(80), // 80% chance active
            'featured'    => $this->faker->boolean(20), // 20% chance featured
            'new'         => $this->faker->boolean(30), // 30% chance new
            'category_id' => !empty($categoriesIds) ? $this->faker->randomElement($categoriesIds) : null,
            'price'       => $this->faker->randomFloat(2, 5, 500), // price between 5.00 and 500.00
            'variations'  => null, 
        ];
    }
}
