<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employer>
 */
class EmployerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->name,
            'logo' => 'https://picsum.photos/id/' . $this->faker->unique()->numberBetween(1, 1000) . '/90/90',
            "user_id" => User::factory(),
        ];
    }
}
