<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     *  The name of the factory's corresponding model.
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
            'text' => $this->faker->realText(100),
            'likes' => $this->faker->numberBetween(0,15),
            'person_id' => 1, //this makes all posts by george to stop factory crash, remove later
        ];
    }
}
