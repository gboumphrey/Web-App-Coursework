<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'favecolour' => $this->faker->randomElement(['Yellow','Red','Blue','Green','Pink','Purple','Orange']),
            'dob' => $this->faker->date(),
        ];
    }
}
