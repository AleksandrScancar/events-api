<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => rand(1,10),
            'title' => $this->faker->title,
            'place' => $this->faker->streetAddress,
            'description' =>  $this->faker->text,
            'from' =>  $this->faker->date,
            'until' =>   $this->faker->date
        ];
    }
}
