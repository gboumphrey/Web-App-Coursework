<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Models\UserProfile;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $data = [];
        $data['text'] = $this->faker->realText(50);
        $data['user_id'] = User::inRandomOrder()->first()->id;
        $data['commentable_type'] = $this->faker->randomElement(['App\\Models\\UserProfile','App\\Models\\Post']);
        $data['commentable_id'] = $this->faker->numberBetween(1,25); //not good but oh well
        return $data;
    }
}
