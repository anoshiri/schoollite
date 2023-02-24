<?php

namespace Database\Factories;

use App\Models\SessionTerm;
use App\Models\SchoolSession;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SessionTerm>
 */
class SessionTermFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $session = SchoolSession::inRandomOrder()->first();

        return [
            'name' => $this->faker->sentence(),
            //'school_session_id' => $session->id,
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
        ];
    }
}
