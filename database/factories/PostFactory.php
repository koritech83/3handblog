<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->sentence(),
            'contents'=>$this->faker->paragraph(10),
            'user_id'=>factory(User::class)->create()->id,
            'category_id'=>factory(Category::class)->create()->id,
        ];
    }
}
