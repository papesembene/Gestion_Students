<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => $this->faker->numberBetween(1, 10),
            'matiere_id' => $this->faker->numberBetween(1, 10),
            'note' => $this->faker->numberBetween(0, 20),
            'appreciation' => $this->faker->text(30),
            'periode' => $this->faker->numberBetween(1, 3),
            'year' => $this->faker->numberBetween(2018, 2021),
            'session' => $this->faker->numberBetween(1, 2),
            'type' => $this->faker->numberBetween(1, 2),
            'coeff' => $this->faker->numberBetween(1, 5),
        ];
    }
}
