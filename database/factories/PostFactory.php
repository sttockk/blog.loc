<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'description' => $this->faker->sentence,
            'image' => $this->faker->image('public/uploads', 640, 480, null, false),
            'views' => $this->faker->numberBetween(0, 5000),
            'category_id' => 1,
            'user_id' => 1,
            'status' => 1,
            'is_featured' => 0,
        ];
    }
}
