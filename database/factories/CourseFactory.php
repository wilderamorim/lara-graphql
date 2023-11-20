<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoryIds = Category::pluck('id')->all();
        $randomCategoryId = $this->faker->randomElement($categoryIds);

        return [
            'category_id' => $randomCategoryId,
            'name' => $this->faker->name,
            'description' => $this->faker->text,
        ];
    }
}
