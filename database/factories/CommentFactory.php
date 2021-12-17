<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content'=>$this->faker->paragraph(3),
            'user_id' => factory(User::class)->create()->id,
            'post_id' => factory(Post::class)->create()->id,
        ];
    }
}
