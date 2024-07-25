<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => $this->faker-> sentence(3),
            "text" => $this->faker-> paragraph(3),
            "post_id" => $this->faker-> numberBetween(1,10),
            'user_id' => User::inRandomOrder()->first()->id,


        ];
    }
}
