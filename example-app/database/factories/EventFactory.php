<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'eventName' => fake()->name(),
            'budget' => fake()->numberBetween(1,20000),
            'detail' => fake()->realTextBetween(10,20,5),
            'status' => 'PENDING',
            'size' => fake()->numberBetween(1.50),

        ];
    }
}
