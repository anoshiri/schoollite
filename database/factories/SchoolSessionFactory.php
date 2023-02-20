<?php

namespace Database\Factories;

use App\Models\SchoolSession;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SchoolSession>
 */
class SchoolSessionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
        ];
    }
}
