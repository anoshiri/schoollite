<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Arms>
 */
class ArmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $teacher = Teacher::inRandomOrder()->first();

        return [
            'name' => fake()->safeColorName(),
            'description' => fake()->sentence(),
            'teacher_id' => $teacher->id,
        ];
    }
}
