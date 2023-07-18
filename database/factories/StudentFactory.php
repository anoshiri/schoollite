<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // make images
        $images = [];
        $tot = rand(1, 6);

        
        for ($count=0; $count < $tot; $count++) {
            $uploadedFile = $this->faker->image(null, 500, 500, 'people');

            $fileName = explode('/', str_replace('\\', '/', $uploadedFile));
            $file = 'public/students/'. end($fileName);

            Storage::move($uploadedFile, $file);
            
            array_push($images, $file);
        }

        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'gender' => fake()->randomElement(['male', 'female']),
            'date_of_birth' => fake()->date(),
            'photos' => $images,
        ];
    }
}
