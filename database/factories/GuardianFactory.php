<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class GuardianFactory extends Factory
{

    

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        // make images
        $dir = base_path('storage/guardians');
        $images = [];
        $tot = rand(1, 2);
        for ($count=0; $count < $tot; $count++) {
            array_push($images, $this->faker->image($dir, 500, 500, 'people'));
        }


        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'gender' => fake()->randomElement(['male', 'female']),
            'street' => fake()->streetAddress(),
            'city' => fake()->city(),
            'state' => fake()->state(),
            'photos' => $this->faker->image($dir, 500, 500, 'people'),
        ];
    }
}
