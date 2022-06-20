<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categories = Category::query()->whereNull('parent_id')->get()->pluck('id')->toArray();
        $condition = $this->faker->randomElement([true,false]);
        return [
            'name'=> $this->faker->name,
            'parent_id' => $condition ? $this->faker->randomElement($categories) : null
        ];
    }
}
