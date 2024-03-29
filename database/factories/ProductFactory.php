<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Color;
use App\Models\Size;
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
        return [
            'name' => fake()->name(),
            'brand_id' => Brand::factory()->create()->id,
            'size_id' => Size::factory()->create()->id,
            'color_id' => Color::factory()->create()->id,
            'status' => true,
        ];
    }
}
